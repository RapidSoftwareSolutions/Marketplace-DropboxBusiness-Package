<?php
$app->post('/api/DropboxBusiness/addTeamMember', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'memberEmail']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "2/team/members/add";
    $body = array();

    $body['new_members'][]['member_email'] = $post_data['args']['memberEmail'];

    if (isset($post_data['args']['memberGivenName']) && strlen($post_data['args']['memberGivenName']) > 0) {
        $body['new_members'][]['member_given_name'] = $post_data['args']['memberGivenName'];
    }
    if (isset($post_data['args']['memberSurname']) && strlen($post_data['args']['memberSurname']) > 0) {
        $body['new_members'][]['member_surname'] = $post_data['args']['memberSurname'];
    }
    if (isset($post_data['args']['memberExternalId']) && strlen($post_data['args']['memberExternalId']) > 0) {
        $body['new_members'][]['member_external_id'] = $post_data['args']['memberExternalId'];
    }
    if (isset($post_data['args']['memberPersistentId']) && strlen($post_data['args']['memberPersistentId']) > 0) {
        $body['new_members'][]['member_persistent_id'] = $post_data['args']['memberPersistentId'];
    }
    if (isset($post_data['args']['sendWelcomeEmail']) && strlen($post_data['args']['sendWelcomeEmail']) > 0) {
        $body['new_members'][]['send_welcome_email'] = $post_data['args']['sendWelcomeEmail'];
    }
    if (isset($post_data['args']['memberRole']) && strlen($post_data['args']['memberRole']) > 0) {
        $body['new_members'][]['role']['.tag'] = $post_data['args']['memberRole'];
    }
    if (isset($post_data['args']['forceAsync']) && strlen($post_data['args']['forceAsync']) > 0) {
        $body['force_async'] = $post_data['args']['forceAsync'];
    }
    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('POST', $query_str, [
            'headers' => [
                "Authorization" => "Bearer " . $post_data['args']['accessToken']
            ],
            'json' => $body
        ]);

        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());

        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getReasonPhrase();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $responseBody;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }


    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});