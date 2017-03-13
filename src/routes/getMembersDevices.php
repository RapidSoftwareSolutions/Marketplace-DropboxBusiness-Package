<?php
$app->post('/api/DropboxBusiness/getMembersDevices', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "2/team/devices/list_members_devices";
    $body = array();
    if (isset($post_data['args']['cursor']) && strlen($post_data['args']['cursor']) > 0){
        $body['cursor'] = $post_data['args']['cursor'];
    }

    if (isset($post_data['args']['includeWebSessions']) && strlen($post_data['args']['includeWebSessions']) > 0){
        $body['include_web_sessions'] = $post_data['args']['includeWebSessions'];
    }
    if (isset($post_data['args']['includeDesktopClients']) && strlen($post_data['args']['includeDesktopClients']) > 0){
        $body['include_desktop_clients'] = $post_data['args']['includeDesktopClients'];
    }
    if (isset($post_data['args']['includeMobileClients']) && strlen($post_data['args']['includeMobileClients']) > 0){
        $body['include_mobile_clients'] = $post_data['args']['includeMobileClients'];
    }
    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('POST', $query_str, [
            'headers'=>[
                "Authorization" => "Bearer ". $post_data['args']['accessToken']
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