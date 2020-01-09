<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SaveResultExample extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $listQuestion;
    protected $listAnswer;
    protected $scoreQuiz;

    public function __construct($listQuestion, $listAnswer, $scoreQuiz)
    {
        $this->listAnswer = $listAnswer;
        $this->listQuestion = $listQuestion;
        $this->scoreQuiz = $scoreQuiz;
//        $this->listAnswerChoose = $listAnswerChoose;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'listQuestion' => $this->listQuestion,
            'listAnswer' => $this->listAnswer,
            'score' => $this->scoreQuiz
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
