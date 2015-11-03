<?php
namespace views;
class CreatePostForm{
    static function get() {
        return "
            <form action='' method='post'>
                <input type='text' name='title' placeholder='Add Title'/>
                <input type='text' name='content' placeholder='...'/>
                <button class='btn btn-success name='submit' value='create'><span class='glyphicon glyphicon-plus'></span></button>
            </form>
        ";
    }
}
