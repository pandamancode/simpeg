<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function show_my_modal($content='', $id='', $data='', $size='md') {
    
        if ($content != '') {
            $view_content = view($content, $data);
    
            return '<div class="modal fade" id="' .$id .'" role="dialog" data-backdrop="static" data-keyboard="false">
                      <div class="modal-dialog modal-' .$size .'" role="document">
                        <div class="modal-content">
                            ' .$view_content .'
                        </div>
                      </div>
                    </div>';
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
