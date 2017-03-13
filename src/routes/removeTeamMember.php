<?php
$app->post('/api/DropboxBusiness/removeTeamMember', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'memberIdType', 'memberId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "2/team/members/remove";
    $body = array();


    $body['user']['.tag'] = $post_data['args']['memberIdType'];
    $body['user'][$post_data['args']['memberIdType']] = $post_data['args']['memberId'];

    if (isset($post_data['args']['wipeData']) && strlen($post_data['args']['wipeData']) > 0){
        $body['wipe_data'] = $post_data['args']['wipeData'];
    }
    if (isset($post_data['args']['destinationMemberIdType']) && strlen($post_data['args']['destinationMemberIdType']) > 0){
        $body['transfer_dest_id']['.tag'] = $post_data['args']['destinationMemberIdType'];
    }
    if (isset($post_data['args']['destinationMemberId']) && strlen($post_data['args']['destinationMemberId']) > 0){
        $body['transfer_dest_id'][$post_data['args']['destinationMemberIdType']] = $post_data['args']['destinationMemberId'];
    }

    if (isset($post_data['args']['adminMemberIdType']) && strlen($post_data['args']['adminMemberIdType']) > 0){
        $body['transfer_admin_id']['.tag'] = $post_data['args']['adminMemberIdType'];
    }
    if (isset($post_data['args']['adminMemberId']) && strlen($post_data['args']['adminMemberId']) > 0){
        $body['transfer_admin_id'][$post_data['args']['adminMemberIdType']] = $post_data['args']['adminMemberId'];
    }
    if (isset($post_data['args']['keepAccount']) && strlen($post_data['args']['keepAccount']) > 0){
        $body['keep_account'] = $post_data['args']['keepAccount'];
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