<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:09:57
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_getintouch.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf265b8a7d7_20001854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6efc55ee250be9b9d794364a2ef6835493784b54' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_getintouch.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5feaf265b8a7d7_20001854 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="get-in-touch">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3 class="col-heading">Get in touch</h3>
      </div>
      <div class="col-md-12">
        <form id="getInTouch" class="get-in-touch-form js_ajax-forms" data-url="core/contact.php">
          <div class="row">
            <div class="col form-group">
              <input type="text" class="form-control" name="name" placeholder=" Name" />
            </div>
            <div class="col form-group">
              <input
                type="email"
                class="form-control"
                placeholder=" Email"
                name="email"
              />

            </div>
            <input type="hidden" class="form-control" name="subject" value="Get In Touch Mails" />
            <div class="col-md-12">
              <div class="form-group">
                <textarea
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="4"
                  placeholder="Message"
                  name="message"
                ></textarea>
              </div>
            </div>
          </div>
          <div class="text-center">
            <button class="learn-btn mt-50" type="submit">Submit</button>
          </div>
          <!-- success -->
          <div class="err_block">
            <div class="alert alert-success x-hidden col-md-6 offset-md-3"></div>
            <!-- success -->
            <!-- error -->
            <div class="alert alert-danger x-hidden col-md-6 offset-md-3"></div>
            <!-- error -->
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
<?php }
}
