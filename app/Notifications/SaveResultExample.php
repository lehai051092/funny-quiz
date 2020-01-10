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
    protected $quiz;
    protected $listAnswersUserChoose;

    public function __construct($listQuestion, $listAnswer, $scoreQuiz, $quiz, $listAnswersUserChoose)
    {
        $this->listAnswer = $listAnswer;
        $this->listQuestion = $listQuestion;
        $this->scoreQuiz = $scoreQuiz;
        $this->quiz = $quiz;
        $this->listAnswersUserChoose = $listAnswersUserChoose;
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
            'score' => $this->scoreQuiz,
            'quiz' => $this->quiz,
            'listAnswersUserChoose' => $this->listAnswersUserChoose,
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
