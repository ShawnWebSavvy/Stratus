<div class="get-in-touch">
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
            <button class="learn-btn mt-50 cnt_btn" type="submit">Submit</button>
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
