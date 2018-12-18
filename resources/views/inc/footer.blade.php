<div class="container" id="foot">
    
        <p id="copyright" style="margin-top: 150px;"><b>Copyright 2018 &copy; JAAW</b></p>
        <button type="button" id="contact" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter"><b style="font-size: 22px;">
          Contact Us</b>
        </button>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <div class="container contact-form">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if (session('warning'))
                          <div class="alert alert-warning">
                              {{ session('warning') }}
                          </div>
                      @endif
                  
                  <form method="post" action="{{ route('contactus.store') }}">
                  {{ csrf_field() }}
                  <h3>Contact Us</h3>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                              <input type="text" name="name" class="form-control" placeholder="Your Name *"  required />
                   @if ($errors->has('name'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                   @endif
                          </div>
                          <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                              <input type="email" name="email" class="form-control" placeholder="Your Email *"  required />
                               @if ($errors->has('email'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                               @endif
                          </div>
                          <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
                              <input type="text" name="subject" class="form-control" placeholder="Subject *"  />
                              @if ($errors->has('subject'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('subject') }}</strong>
                                          </span>
                               @endif
                          </div>
                          <div class="form-group">
                              <input type="submit" name="btnSubmit" class="btn btn-primary btn-round btn-sm" value="Send Message" />
                              
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
                              <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required></textarea>
                   @if ($errors->has('message'))
                  <span class="help-block">
                  <strong>{{ $errors->first('message') }}</strong>
                  </span>
                  @endif
                          </div>
                      </div>
                  </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>



<a class="footer-social" href="https://github.com/martenEkhart/GroepsProject">
<i class="fa fa-github" style="font-size:60px;color:black;margin-left: 1%"></i>

    </div>   