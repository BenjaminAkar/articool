<?php
namespace Api\v1;
use Phalcon\Validation;

use Phalcon\Validation\Message;
use Phalcon\Validation\Validator\{StringLength};

use \ControllerBase;
use \Users;
use \Posts;

class SearchController extends ControllerBase {

    public function searchAuthorsAction()
    {
        $validation = new Validation();   

        // put errors in array
        $messages = $validation->validate($validation);
    
        // Set values sent from form to variables
        $query = $this->dispatcher->getParam('query');

        // find user
        // condition found on https://ohdoylerules.com/tricks/handle-spaces-and-no-spaces-in-mysql-where-like-clauses/
        // OLD WAY: username LIKE :value: OR first_name LIKE :value: OR last_name LIKE :value:
        $users = Users::find([
            'conditions' => 'LOWER(CONCAT(first_name, last_name, username)) LIKE LOWER(REPLACE(:value:, " ", "%"))',
            'columns' => [
                'username',
                'first_name',
                'last_name',
                'avatar',
            ],
            'limit' => 5,
            'bind' => [
                'value' => "%" . trim($query) . "%"
            ]
        ]);

        // if user enters less than 2 characters
        if(strlen($query) <= 2) {
            $messages->appendMessage( new Message('Write 3 or more letters to search.') );
        }

        // if search results nothing
        if(($users->count() == 0) && count($messages) == 0) {
            $messages->appendMessage( new Message('No results for' . " '". $query . "'") );
        }

        // if no errors
        if(count($messages) == 0) {
            return $this->ajaxResponse(true, ['Authors found'], 'ajax', $users->toArray());
        }
        return $this->ajaxResponse(false, $messages, 'ajax');
    }

}