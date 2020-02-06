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

class Message extends AbstractApiCall
{
    public function sms($callback, $contents, $receiverTelNo, $userKey, $advertisementYn = false)
    {
        $args = [
            'callback' => $callback,
            'contents' => $contents,
            'receiverTelNo' => $receiverTelNo,
            'userKey' => $userKey,
            'advertisementYn' => $advertisementYn ? 'Y' : 'N'
        ];

        return $this->adapter->post('message/sms', $args);
    }

    public function lms($callback, $contents, $receiverTelNo, $userKey, $title = '', $advertisementYn = false)
    {
        $args = [
            'callback' => $callback,
            'contents' => $contents,
            'receiverTelNo' => $receiverTelNo,
            'userKey' => $userKey,
            'advertisementYn' => $advertisementYn ? 'Y' : 'N'
        ];
        if (!empty($title)) $args['title'] = $title;

        return $this->adapter->post('message/lms', $args);
    }

    public function mms($callback, $contents, $receiverTelNo, $userKey, $title = '', $advertisementYn = false, array $attachment = [])
    {
        $args = [
            'callback' => $callback,
            'contents' => $contents,
            'receiverTelNo' => $receiverTelNo,
            'userKey' => $userKey,
            'advertisementYn' => $advertisementYn ? 'Y' : 'N'
        ];
        $files = [];
        if (!empty($title)) $args['title'] = $title;
        if (is_array($attachment)) {
            $count = 1;
            foreach ($attachment as $attach) {
                if (file_exists(realpath($attach))) {
                    $files["imageFile{$count}"] = $attach;
                    if (++$count > 3) break;
                }
            }
        }

        return $this->adapter->post('message/mms', $args, $files);
    }

    public function isms($callback, $contents, $receiverTelNo, $userKey, $advertisementYn = false, $onlyEnglish = false)
    {
        $args = [
            'callback' => $callback,
            'contents' => $contents,
            'receiverTelNo' => $receiverTelNo,
            'userKey' => $userKey,
            'advertisementYn' => $advertisementYn ? 'Y' : 'N',
            'inputMode' => $onlyEnglish ? 'ASCII' : 'ETC'
        ];

        return $this->adapter->post('message/isms', $args);
    }
}