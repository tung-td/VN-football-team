<!-- Start: modal question -->
<div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Do you have any questions?</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email1"
                                placeholder="Your email address...">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="question1"
                                placeholder="Your questions...">
                        </div>
                        <button type="button" class="btn btn-info btn-block btn-round">Submit</button>
                    </form>
                    <!-- </div> -->
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END Footer -->

<!--Start: modal login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Login</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <form action="{{route('client.login.handle')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input name="client_user" type="text" class="form-control" id="user1"
                                placeholder="Your username...">
                        </div>
                        <div class="form-group">
                            <input name="client_password" type="password" class="form-control" id="password1"
                                placeholder="Your password...">
                        </div>
                        <p style="color: red; font-size: 12px;">
                            <?php
                            use Illuminate\Support\Facades\Session;
                            $message = Session::get('message');
                            $status = Session::get('status');
                            if ($message) {
                                echo $message;
                                Session::put('message', null);
                                ?> <script>
                                $(function() {
                                    $('#loginModal').modal('show');
                                });
                                </script> <?php
                            }
                            if ($status) {
                                echo $status;
                                Session::put('status', null);
                                ?> <script>
                                $(function() {
                                    $('#loginModal').modal('show');
                                });
                                </script> <?php
                            }
                        ?>
                        </p>
                        <button type="submit" class="btn btn-info btn-round">Login</button>
                    </form>

                    <div class="text-center text-muted delimiter">or use a social network</div>
                    <div class="d-flex justify-content-center social-buttons">
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip"
                            data-placement="top" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip"
                            data-placement="top" title="Facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip"
                            data-placement="top" title="Linkedin">
                            <i class="fab fa-linkedin"></i>
                        </button>
                        </di>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Not a member yet? 
                    <a href="{{route('client.register')}}" class="text-inf"> Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal sign up -->
<div class="modal fade" id="sign-up_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Sign Up</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <form action="{{route('client.register.handle')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input name="client_user" type="name" class="form-control" id="name" placeholder="Enter your name...">
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" id="email1"
                                placeholder="Your email address...">
                        </div>
                        <div class="form-group">
                            <input name="client_password" type="password" class="form-control" id="password1"
                                placeholder="Your password...">
                        </div>
                        <!-- <div class="form-group">
                        <input type="password" class="form-control" id="password1_confirmation" placeholder="Retype password...">
                    </div> -->
                        <button type="submit" class="btn btn-info btn-round">Sign Up</button>
                    </form>

                    <div class="text-center text-muted delimiter">or use a social network</div>
                    <div class="d-flex justify-content-center social-buttons">
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip"
                            data-placement="top" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip"
                            data-placement="top" title="Facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip"
                            data-placement="top" title="Linkedin">
                            <i class="fab fa-linkedin"></i>
                        </button>
                        </di>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">If you have an acount? <a href="#loginModal" data-dismiss="modal"
                        data-toggle="modal" class="text-inf"> Login</a>.</div>
            </div>
        </div>
    </div>
</div>

<!-- Start: modal user -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Have a good day, {{session('name')}}!</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <button onclick="window.location='{{ route('client.info')}}'" type="button" class="btn btn-info btn-round">Info</button>
                    <button onclick="window.location='{{ route('client.update')}}'" type="button" class="btn btn-info btn-round">Update</button>
                    <button onclick="window.location='{{ route('client.logout')}}'" type="button" class="btn btn-info btn-round">Log Out</button>
                </div>
            </div>

        </div>
    </div>
</div>