<?php

namespace NotificationChannels\Fawzanm\Pushy;


class PushyMessage
{
    private $to;

    private $notification;

    private $data;


    /**
     * @param $recipient -> can be a token, array of tokens or topic
     * @param bool $is_topic
     * @return $this
     */
    public function to($recipient, $is_topic = false)
    {
        if ($is_topic && is_string($recipient)) {
            $this->to = '/topics/' . $recipient;
        } elseif (is_array($recipient) && count($recipient) == 1) {
            $this->to = $recipient[0];
        } else {
            $this->to = $recipient;
        }

        return $this;

    }

    /**
     * @param array|null $data
     * @return $this
     */
    public function data($data = null)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * The notification object to send to Pushy.
     * @param array $params ['data' => [], 'notification' => []]
     * @return $this
     */
    public function notification(array $params)
    {
        $this->notification = $params;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return mixed
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }


}
