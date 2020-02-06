<?php

/**
 * whideshot.co.kr PHP API Client
 *
 * @package DevHun\Wideshot
 * @author  https://github.com/devhun
 * @license https://opensource.org/licenses/mit-license.php MIT
 * @see     https://github.com/devhun/wideshot-api-client
 */

namespace DevHun\Wideshot\ApiCall;

class Kakao extends AbstractApiCall
{
    public function alimtalk($plusFriendId, $senderKey, $templateCode, $contents, $receiverTelNo, $userKey, $title = '', $attachment = '')
    {
        $args = [
            'plusFriendId' => $plusFriendId,
            'senderKey' => $senderKey,
            'templateCode' => $templateCode,
            'contents' => $contents,
            'receiverTelNo' => $receiverTelNo,
            'userKey' => $userKey
        ];
        if (!empty($title)) $args['title'] = $title;
        if (!empty($title)) $args['attachment'] = $attachment;

        return $this->adapter->post('message/alimtalk', $args);
    }

    public function friendtalk($plusFriendId, $senderKey, $contents, $receiverTelNo, $userKey, $title = '', $advertisementYn = false, $friendtalkImage = '', $attachment = '')
    {
        $args = [
            'plusFriendId' => $plusFriendId,
            'senderKey' => $senderKey,
            'contents' => $contents,
            'receiverTelNo' => $receiverTelNo,
            'userKey' => $userKey,
            'advertisementYn' => $advertisementYn ? 'Y' : 'N'
        ];
        $files = [];
        if (!empty($title)) $args['title'] = $title;
        if (!empty($friendtalkImage)) {
            if (file_exists(realpath($friendtalkImage))) {
                $files['friendtalkImage'] = $friendtalkImage;
                $attach = json_decode($attachment, true);
                $attach['image']['img_url'] = '%s';
                $attachment = json_encode($attach, JSON_UNESCAPED_UNICODE);
            }
        }
        if (!empty($attachment)) $args['attachment'] = $attachment;

        return $this->adapter->post('message/friendtalk', $args, $files);
    }
}