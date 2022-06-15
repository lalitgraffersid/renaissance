<?php

/**
 * @copyright Copyright (c) 2009-2019 ThemeCatcher (https://www.themecatcher.net)
 */
class Quform_Permissions
{
    /**
     * Get the list of all plugin capabilities
     *
     * @return array
     */
    public function getAllCapabilities()
    {
        return apply_filters('quform_capabilities', array(
            'quform_full_access' => __('Full Access', 'quform'),
            'quform_view_dashboard' => __('View Dashboard', 'quform'),
            'quform_list_forms' => __('List Forms', 'quform'),
            'quform_add_forms' => __('Add Forms', 'quform'),
            'quform_edit_forms' => __('Edit Forms', 'quform'),
            'quform_delete_forms' => __('Delete Forms', 'quform'),
            'quform_view_entries' => __('View Entries', 'quform'),
            'quform_edit_entries' => __('Edit Entries', 'quform'),
            'quform_delete_entries' => __('Delete Entries', 'quform'),
            'quform_resend_notifications' => __('Resend Notifications', 'quform'),
            'quform_view_tools' => __('View Tools Page', 'quform'),
            'quform_export_entries' => __('Export Entries', 'quform'),
            'quform_export_forms' => __('Export Forms', 'quform'),
            'quform_import_forms' => __('Import Forms', 'quform'),
            'quform_settings' => __('Edit Settings', 'quform'),
            'quform_help' => __('View Help Page', 'quform')
        ));
    }

    /**
     * On activation give the 'administrator' role the capabilities to manage forms
     */
    public function activate()
    {
        $role = get_role('administrator');

        if ($role instanceof WP_Role) {
            $caps = array_keys($this->getAllCapabilities());

            foreach ($caps as $cap) {
                $role->add_cap($cap);
            }
        }

        // Rebuild the current user capabilities so that the plugin menu items are visible on first install
        $user = wp_get_current_user();

        if ($user instanceof WP_User && $user->has_cap('activate_plugins')) {
            $user->get_role_caps();
        }
    }

    /**
     * Update the permissions based on the given array
     *
     * @param array $permissions
     */
    public function update(array $permissions)
    {
        $caps = array_keys($this->getAllCapabilities());

        /* @var $wp_roles WP_Roles */
        global $wp_roles;
        $roles = $wp_roles->get_names();

        foreach ($roles as $key => $name) {
            if ($key === 'administrator') {
                continue;
            }

            $role = get_role($key);

            if ( ! $role instanceof WP_Role) {
                continue;
            }

            foreach ($caps as $cap) {
                $add = isset($permissions[$key][$cap]) && $permissions[$key][$cap];

                if ( ! $role->has_cap($cap) && $add) {
                    $role->add_cap($cap);
                } elseif ($role->has_cap($cap) && ! $add) {
                    $role->remove_cap($cap);
                }
            }
        }
    }

    /**
     * On plugin uninstall, remove all capabilities from all roles
     */
    public function uninstall()
    {
        $caps = array_keys($this->getAllCapabilities());

        /* @var $wp_roles WP_Roles */
        global $wp_roles;
        $roles = $wp_roles->get_names();

        foreach ($roles as $key => $name) {
            $role = get_role($key);

            if ( ! $role instanceof WP_Role) {
                continue;
            }

            foreach ($caps as $cap) {
                if ($role->has_cap($cap)) {
                    $role->remove_cap($cap);
                }
            }
        }
    }

    /**
     * If the user has the quform_full_access capability then give them all plugin capabilities
     *
     * @param   array  $allcaps  All of the user's capabilities
     * @param   array  $caps     The actual capabilities for a meta capability
     * @param   array  $args     The arguments to WP_User::has_cap, $args[0] is the capability name
     * @return  array
     */
    public function fullAccessCheck($allcaps, $caps, $args)
    {
        $capabilities = $this->getAllCapabilities();
        unset($capabilities['quform_full_access']);

        if (isset($args[0]) && isset($capabilities[$args[0]])) {
            // This is one of our capabilities
            if (isset($allcaps['quform_full_access']) && $allcaps['quform_full_access']) {
                // The user has the quform_full_access capability
                foreach ($capabilities as $capability => $description) {
                    $allcaps[$capability] = true;
                }
            }
        }

        return $allcaps;
    }
}
