<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');

class DropboxBusinessTest extends BaseTestCase
{

    public function testListMetrics()
    {

        $routes = [
            'permanentlyDelete',
            'getAuthenticatedAdmin',
            'renameTeamFolder',
            'deleteArchivedFolder',
            'getTeamFolders',
            'getTeamFoldersMetadata',
            'createTeamFolder',
            'checkArchiveFolderStatus',
            'archiveTeamFolder',
            'setActiveArchivedFolder',
            'getTeamStorageUsageReport',
            'getTeamMembershipReport',
            'getTeamLinkedDevicesReport',
            'getTeamUsersActivityReport',
            'unsuspendMemberFromTeam',
            'suspendMemberFromTeam',
            'updateTeamMemberProfile',
            'updateTeamMemberPermissions',
            'sendWelcomeEmail',
            'checkRemoveTeamMemberStatus',
            'removeTeamMember',
            'recoverDeletedMember',
            'paginateTeamMembers',
            'getSingleTeamMemberInfo',
            'getTeamMembersInfo',
            'getTeamMembers',
            'checkAddTeamMemberStatus',
            'addTeamMember',
            'revokeLinkedApps',
            'revokeSingleLinkedApp',
            'getMembersLinkedApps',
            'getSingleMemberLinkedApps',
            'updateSingleGroup',
            'setGroupMemberAccessType',
            'removeGroupMembers',
            'paginateGroupMembers',
            'getGroupMembers',
            'addGroupMember',
            'paginateTeamGroups',
            'getTeamGroups',
            'getGroupJobStatus',
            'getGroups',
            'getSingleGroup',
            'deleteGroup',
            'createGroup',
            'getTeam',
            'revokeDevicesSession',
            'revokeSingleDeviceDesktopSession',
            'revokeSingleDeviceMobileSession',
            'revokeSingleDeviceWebSession',
            'getMembersDevices',
            'getSingleMemberDevices',
            'revokeAccessToken',
            'getAccessToken'
        ];

        foreach ($routes as $file) {
            $var = '{  
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/DropboxBusiness/' . $file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in ' . $file . ' method');
        }
    }

}
