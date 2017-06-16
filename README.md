[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/DropboxBusiness/functions?utm_source=RapidAPIGitHub_DropboxBusinessFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# DropboxBusiness Package
DropboxBusiness
* Domain: [DropboxBusiness](http://dropbox.com)
* Credentials: apiKey

## How to get credentials: 
0. Go to [Dropbox website](http://dropbox.com/) 
1. Log in or create a new account
2. [Register an app](https://www.dropbox.com/developers)
3. After creation your app you will see api Secret and api Key

## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 
   ## Setting up the webhook
   0. Go to [Dropbox website](http://dropbox.com/) 
   1. Log in or create a new account
   2. [Go to app page](https://www.dropbox.com/developers/apps)
   3. Insert the webhook url and press add
 
  
   You can use our service as webhookUrl: 
    ```
    https://webhooks.rapidapi.com/api/message/Mandrill/webhookEvent/{projectName}/{projectKey} * see credentials description above
    ```
  
  ## Webhook credentials
   Please use SDK to test this feature.
   0. Go to [RapidAPI](http://rapidapi.com)
   1. Log in or create an account
   2. Go to [My apps](https://dashboard.rapidapi.com/projects)
   3. Add new project with projectName to get your project Key
   | Field      | Type       | Description
   |------------|------------|----------
   | projectName     | credentials| Your RapidAPI project name
   | projectKey | credentials     | Your RapidAPI project key
   

## DropboxBusiness.getAccessToken
Generates user access token

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Dropbox
| apiSecret  | credentials| Api secret obtained from Dropbox
| redirectUri| String     | Redirect uri set for your app
| code       | String     | Code provided by user

## DropboxBusiness.revokeAccessToken
Revokes user access tokens

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token to revoke

## DropboxBusiness.getSingleMemberDevices
List all device sessions of a team's member.

| Field                | Type   | Description
|----------------------|--------|----------
| accessToken          | String | Access token from Dropbox
| teamMemberId         | String | The team's member id
| includeWebSessions   | Boolean| Whether to list web sessions of the team's member The default for this field is True.
| includeDesktopClients| Boolean| Whether to list linked desktop devices of the team's member The default for this field is True.
| includeMobileClients | Boolean| Whether to list linked mobile devices of the team's member The default for this field is True.

## DropboxBusiness.getMembersDevices
List all device sessions of a team's member.

| Field                | Type   | Description
|----------------------|--------|----------
| accessToken          | String | Access token from Dropbox
| cursor               | String | At the first call to the getMembersDevices the cursor shouldn't be passed. Then, if the result of the call includes a cursor, the following requests should include the received cursors in order to receive the next sub list of team devices
| includeWebSessions   | Boolean| Whether to list web sessions of the team's member The default for this field is True.
| includeDesktopClients| Boolean| Whether to list linked desktop devices of the team's member The default for this field is True.
| includeMobileClients | Boolean| Whether to list linked mobile devices of the team's member The default for this field is True.

## DropboxBusiness.revokeSingleDeviceWebSession
Revoke a web session of a team's member

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| teamMemberId| String| The unique id of the member owning the device
| sessionId   | String| The session id

## DropboxBusiness.revokeSingleDeviceMobileSession
Unlink a linked mobile device

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| teamMemberId| String| The unique id of the member owning the device
| sessionId   | String| The session id

## DropboxBusiness.revokeSingleDeviceDesktopSession
Unlink a linked desktop device

| Field         | Type   | Description
|---------------|--------|----------
| accessToken   | String | Access token from Dropbox
| teamMemberId  | String | The unique id of the member owning the device
| sessionId     | String | The session id
| deleteOnUnlink| Boolean| Whether to delete all files of the account (this is possible only if supported by the desktop client and will be made the next time the client access the account) The default for this field is False.

## DropboxBusiness.revokeDevicesSession
Unlink a linked desktop device

| Field        | Type  | Description
|--------------|-------|----------
| accessToken  | String| Access token from Dropbox
| revokeDevices| JSON  | List of devices. For example: {"web_session" : {"session_id": "123", "team_member_id" : "321"}, "mobile_client" : {"session_id": "123", "team_member_id" : "321"}, "desktop_client" : {"session_id": "123", "team_member_id" : "321", "delete_on_unlink" : true}}

## DropboxBusiness.getTeam
Retrieves information about a team.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox

## DropboxBusiness.createGroup
Creates a new, empty group, with a requested name.

| Field              | Type  | Description
|--------------------|-------|----------
| accessToken        | String| Access token from Dropbox
| groupName          | String| Group name.
| groupExternalId    | String| The creator of a team can associate an arbitrary external ID to the group.
| groupManagementType| Select| Whether the team can be managed by selected users, or only by team admins. Possible values: user_managed, company_managed, system_managed.

## DropboxBusiness.deleteGroup
Deletes a group. The group is deleted immediately. However the revoking of group-owned resources may take additional time.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| groupId    | String| External ID of the group.

## DropboxBusiness.getSingleGroup
Retrieves information about one group

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| groupId    | String| External ID of the group.

## DropboxBusiness.getGroups
Retrieves information about several groups

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| groupIds   | List  | External IDs of groups.

## DropboxBusiness.getGroupJobStatus
Retrieves information about status of any of group job

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| groupJobId | String| Id of the asynchronous job. This is the value of a response returned from the method that launched the job

## DropboxBusiness.getTeamGroups
Lists groups on a team.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| limit      | Number| Number of results to return per call. The default for this field is 1000.

## DropboxBusiness.paginateTeamGroups
Use this to paginate through all groups.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| cursor     | String| Indicates from what point to get the next set of groups.

## DropboxBusiness.addGroupMember
Adds member to a group.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| groupId     | String| External ID of the group.
| memberIdType| Select| Type of user id. Possible values: team_member_id, external_id, email.
| memberId    | String| Id of the user.
| accessType  | Select| Access type. Possible values: member, owner.

## DropboxBusiness.getGroupMembers
Lists members of a group.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| groupId    | String| External ID of the group.
| limit      | Number| Number of results to return per call. The default for this field is 1000.

## DropboxBusiness.paginateGroupMembers
Use this to paginate through all members of the group.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| cursor     | String| Indicates from what point to get the next set of groups.

## DropboxBusiness.removeGroupMembers
Removes members from a group..

| Field        | Type   | Description
|--------------|--------|----------
| accessToken  | String | Access token from Dropbox
| groupId      | String | External ID of the group.
| users        | List   | List of users to be removed from the group. Example [{".tag" : "email", "email" : "justin@emaple.com" }] 
| returnMembers| Boolean| Whether to return the list of members in the group. Note that the default value will cause all the group members to be returned in the response. This may take a long time for large groups. The default for this field is True.

## DropboxBusiness.setGroupMemberAccessType
Sets a member's access type in a group.

| Field        | Type   | Description
|--------------|--------|----------
| accessToken  | String | Access token from Dropbox
| groupId      | String | External ID of the group.
| memberIdType | Select | Type of user id. Possible values: team_member_id, external_id, email.
| memberId     | String | Id of the user.
| accessType   | Select | Access type. Possible values: member, owner.
| returnMembers| Boolean| Whether to return the list of members in the group. Note that the default value will cause all the group members to be returned in the response. This may take a long time for large groups. The default for this field is True.

## DropboxBusiness.updateSingleGroup
Updates a group's name and/or external ID.

| Field                 | Type   | Description
|-----------------------|--------|----------
| accessToken           | String | Access token from Dropbox
| groupId               | String | External ID of the group.
| newGroupName          | String | New group name.
| newGroupExternalId    | String | New arbitrary external ID to the group.
| newGroupManagementType| Select | Whether the team can be managed by selected users, or only by team admins. Possible values: user_managed, company_managed, system_managed.
| returnMembers         | Boolean| Whether to return the list of members in the group. Note that the default value will cause all the group members to be returned in the response. This may take a long time for large groups. The default for this field is True.

## DropboxBusiness.getSingleMemberLinkedApps
List all linked applications of the team member.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| teamMemberId| String| The team member id

## DropboxBusiness.getMembersLinkedApps
List all applications linked to the team members' accounts.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| cursors    | String| If the result of the call includes a cursor, the following requests should include the received cursors in order to receive the next sub list of the team applications

## DropboxBusiness.revokeSingleLinkedApp
Revoke a linked application of the team member

| Field        | Type   | Description
|--------------|--------|----------
| accessToken  | String | Access token from Dropbox
| teamMemberId | String | The team member id
| appId        | String | The application id
| keepAppFolder| Boolean| Whether to keep the application dedicated folder (in case the application uses one) The default for this field is True.

## DropboxBusiness.revokeLinkedApps
Revoke linked applications of the team members

| Field          | Type  | Description
|----------------|-------|----------
| accessToken    | String| Access token from Dropbox
| revokeLinkedApp| Array | List of linked apps

## DropboxBusiness.addTeamMember
Adds members to a team.

| Field             | Type   | Description
|-------------------|--------|----------
| accessToken       | String | Access token from Dropbox
| memberEmail       | String | Member's email
| memberGivenName   | String | Member's first name.
| memberSurname     | String | Member's last name.
| memberExternalId  | String | External ID for member.
| memberPersistentId| String | Persistent ID for member. This field is only available to teams using persistent ID SAML configuration.
| sendWelcomeEmail  | Boolean| Whether to send a welcome email to the member. If send_welcome_email is false, no email invitation will be sent to the user. This may be useful for apps using single sign-on (SSO) flows for onboarding that want to handle announcements themselves. The default for this field is True.
| memberRole        | Select | Describes which team-related admin permissions a user has. Possible values: member_only(default), support_admin, user_management_admin, team_admin
| forceAsync        | Boolean| Whether to force the add to happen asynchronously. The default for this field is False.

## DropboxBusiness.checkAddTeamMemberStatus
Use this to poll the status of the asynchronous request of addTeamMember.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access token from Dropbox
| addMemberJobId| String| Id of the asynchronous job.

## DropboxBusiness.getTeamMembers
Lists members of a team.

| Field         | Type   | Description
|---------------|--------|----------
| accessToken   | String | Access token from Dropbox
| limit         | Number | Number of results to return per call. The default for this field is 1000.
| includeRemoved| Boolean| Whether to return removed members. The default for this field is False.

## DropboxBusiness.getTeamMembersInfo
Returns information about multiple team members.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| members    | List  | Example: [{".tag": "team_member_id","team_member_id": "dbmid:efgh5678"}]

## DropboxBusiness.getSingleTeamMemberInfo
Returns information about single team member.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| memberIdType| Select| Argument for selecting a single user, either by team_member_id, external_id or email.
| memberId    | String| Id of the user.

## DropboxBusiness.paginateTeamMembers
Use this to paginate through all team members.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| cursor     | String| Indicates from what point to get the next set of members.

## DropboxBusiness.recoverDeletedMember
Recover a deleted member.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| memberIdType| Select| Argument for selecting a single user, either by team_member_id, external_id or email.
| memberId    | String| Id of the user.

## DropboxBusiness.removeTeamMember
Removes a member from a team.

| Field                  | Type   | Description
|------------------------|--------|----------
| accessToken            | String | Access token from Dropbox
| memberIdType           | Select | Argument for selecting a single user, either by team_member_id, external_id or email.
| memberId               | String | Id of the user.
| destinationMemberIdType| Select | Argument for selecting a single user, either by team_member_id, external_id or email.
| destinationMemberId    | String | If provided, files from the deleted member account will be transferred to this user.
| adminMemberIdType      | Select | Argument for selecting a single user, either by team_member_id, external_id or email.
| adminMemberId          | String | If provided, errors during the transfer process will be sent via email to this user. If the destinationMemberId argument was provided, then this argument must be provided as well. 
| wipeData               | Boolean| If provided, controls if the user's data will be deleted on their linked devices. The default for this field is True.
| keepAccount            | Boolean| Downgrade the member to a Basic account. The user will retain the email address associated with their Dropbox account and data in their account that is not restricted to team members. In order to keep the account the argument wipeData should be set to False. The default for this field is False.

## DropboxBusiness.checkRemoveTeamMemberStatus
Use this to poll the status of the asynchronous request.

| Field                | Type  | Description
|----------------------|-------|----------
| accessToken          | String| Access token from Dropbox
| removeTeamMemberJobId| String| Id of the asynchronous job. 

## DropboxBusiness.sendWelcomeEmail
Sends welcome email to pending team member.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| memberIdType| Select| Argument for selecting a single user, either by team_member_id, external_id or email.
| memberId    | String| Id of the user.

## DropboxBusiness.updateTeamMemberPermissions
Updates a team member's permissions.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| memberIdType| Select| Argument for selecting a single user, either by team_member_id, external_id or email.
| memberId    | String| Id of the user.
| newRole     | Select| Describes which team-related admin permissions a user has. Possible values: team_admin, user_management_admin, support_admin, member_only

## DropboxBusiness.updateTeamMemberProfile
Updates a team member's profile.

| Field             | Type  | Description
|-------------------|-------|----------
| accessToken       | String| Access token from Dropbox
| memberIdType      | Select| Argument for selecting a single user, either by team_member_id, external_id or email.
| memberId          | String| ID of the member
| memberEmail       | String| Member's email
| memberGivenName   | String| Member's first name.
| memberSurname     | String| Member's last name.
| memberExternalId  | String| External ID for member.
| memberPersistentId| String| Persistent ID for member. This field is only available to teams using persistent ID SAML configuration.

## DropboxBusiness.suspendMemberFromTeam
Suspend a member from a team.

| Field       | Type   | Description
|-------------|--------|----------
| accessToken | String | Access token from Dropbox
| memberIdType| Select | Argument for selecting a single user, either by team_member_id, external_id or email.
| memberId    | String | ID of the member
| wipeData    | Boolean| If provided, controls if the user's data will be deleted on their linked devices. The default for this field is True.

## DropboxBusiness.unsuspendMemberFromTeam
Unsuspend a member from a team.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| memberIdType| Select| Argument for selecting a single user, either by team_member_id, external_id or email.
| memberId    | String| ID of the member

## DropboxBusiness.getTeamUsersActivityReport
Retrieves reporting data about a team's user activity.

| Field      | Type      | Description
|------------|-----------|----------
| accessToken| String    | Access token from Dropbox
| startDate  | DatePicker| Timestamp(format="%Y-%m-%d")? Optional starting date (inclusive)
| endDate    | DatePicker| Timestamp(format="%Y-%m-%d")? Optional ending date (exclusive) 

## DropboxBusiness.getTeamLinkedDevicesReport
Retrieves reporting data about a team's linked devices.

| Field      | Type      | Description
|------------|-----------|----------
| accessToken| String    | Access token from Dropbox
| startDate  | DatePicker| Timestamp(format="%Y-%m-%d")? Optional starting date (inclusive)
| endDate    | DatePicker| Timestamp(format="%Y-%m-%d")? Optional ending date (exclusive) 

## DropboxBusiness.getTeamMembershipReport
Retrieves reporting data about a team's membership.

| Field      | Type      | Description
|------------|-----------|----------
| accessToken| String    | Access token from Dropbox
| startDate  | DatePicker| Timestamp(format="%Y-%m-%d")? Optional starting date (inclusive)
| endDate    | DatePicker| Timestamp(format="%Y-%m-%d")? Optional ending date (exclusive) 

## DropboxBusiness.getTeamStorageUsageReport
Retrieves reporting data about a team's storage usage.

| Field      | Type      | Description
|------------|-----------|----------
| accessToken| String    | Access token from Dropbox
| startDate  | DatePicker| Timestamp(format="%Y-%m-%d")? Optional starting date (inclusive)
| endDate    | DatePicker| Timestamp(format="%Y-%m-%d")? Optional ending date (exclusive) 

## DropboxBusiness.setActiveArchivedFolder
Sets an archived team folder's status to active.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| teamFolderId| String| The ID of the team folder.

## DropboxBusiness.archiveTeamFolder
Sets an active team folder's status to archived and removes all folder and file members.

| Field        | Type   | Description
|--------------|--------|----------
| accessToken  | String | Access token from Dropbox
| teamFolderId | String | The ID of the team folder.
| forceAsyncOff| Boolean| Whether to force the archive to happen synchronously. The default for this field is False.

## DropboxBusiness.checkArchiveFolderStatus
Returns the status of an asynchronous job for archiving a team folder.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| archiveJobId| String| Id of the asynchronous job.

## DropboxBusiness.createTeamFolder
Creates a new, active, team folder.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| folderName | String| Name of the folder

## DropboxBusiness.getTeamFoldersMetadata
Retrieves metadata for team folders.

| Field        | Type  | Description
|--------------|-------|----------
| accessToken  | String| Access token from Dropbox
| teamFolderIds| List  | The list of team folder IDs.

## DropboxBusiness.getTeamFolders
Lists all team folders.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| limit      | Number| The maximum number of results to return per request. The default for this field is 1000.

## DropboxBusiness.deleteArchivedFolder
Permanently deletes an archived team folder.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token from Dropbox
| teamFolderId| String| The ID of the team folder.

## DropboxBusiness.renameTeamFolder
Changes an active team folder's name.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access token from Dropbox
| teamFolderId  | String| The ID of the team folder.
| teamFolderName| String| The new name of the team folder.

## DropboxBusiness.getAuthenticatedAdmin
Returns the member profile of the admin who generated the team access token used to make the call.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox

## DropboxBusiness.permanentlyDelete
Permanently delete the file or folder at a given path 

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token from Dropbox
| path       | String| Path in the user's Dropbox to delete.

