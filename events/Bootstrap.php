<?php

namespace app\events;

use Da\User\Event\UserEvent;
use Da\User\Model\User;
use yii\base\Application;
use yii\base\BaseObject;
use yii\base\BootstrapInterface;
use yii\base\Event;

/**
 * Interface Bootstrap
 *
 * @author naffiq
 * @since 0.1.2
 *
 * Best place to register web, console and global events
 *
 * @package app\events
 */
class Bootstrap extends BaseObject implements BootstrapInterface
{
    /**
     * Register web app based events here
     *
     * @param \yii\web\Application $app
     */
    public function webBootstrap(\yii\web\Application $app)
    {
        Event::on(User::class, UserEvent::EVENT_AFTER_CONFIRMATION, function (Event $event) {
            \Yii::trace('New user confirmed (logged from event in \'app\\events\\Bootstrap.php\')', 'events');
        });
        Event::on(User::class, UserEvent::EVENT_AFTER_BLOCK, function (Event $event) {
            \Yii::trace('Blocked user (logged from event in \'app\\events\\Bootstrap.php\')', 'events');
        });
        Event::on(User::class, UserEvent::EVENT_AFTER_BLOCK, function (Event $event) {
            \Yii::trace('Unblocked user (logged from event in \'app\\events\\Bootstrap.php\')', 'events');
        });
    }

    /**
     * Register console app based events here
     *
     * @param \yii\console\Application $app
     */
    public function consoleBootstrap(\yii\console\Application $app)
    {
        Event::on(User::class, UserEvent::EVENT_AFTER_CREATE, function (Event $event) {
            echo 'New user created (logged from event in \'app\\events\\Bootstrap.php\')';
        });
    }

    /**
     * Called during application bootstrap stage.
     *
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        // Global bootstrap
        \Yii::trace(['custom events'], 'Bridge events');

        if ($app instanceof \yii\web\Application) {
            $this->webBootstrap($app);
        } elseif ($app instanceof \yii\console\Application) {
            // Console events registerer
            $this->consoleBootstrap($app);
        }
    }
}