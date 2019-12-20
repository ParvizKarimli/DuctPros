<!-- START CONTACT US -->
<div id="contact-us">
    <div class="container">
        <div class="row d-flex align-items-center position-relative">

            <div class="col-lg-8">
                <div class="appointment-bg">
                    <form class="appointment-form" action="/contact_us" method="post">
                        {{ csrf_field() }}
                        <div class="row d-flex align-items-center">

                            <div class="col-lg-12 d-flex text-center">
                                <div class="section-start-col w-100">
                                    <div>
                                        <h2 class="m-0 heading-icon">Contact Us</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-form-control">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" name="name" class="form-control" placeholder="Name (required)" value="{{ old('name') }}" required/>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-form-control">
                                <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                    <select name="subject" class="form-control" required>
                                        <option value="">-- Subject (required) --</option>
                                        <option value="duct-cleaning" {{ old('subject') === 'duct-cleaning' ? 'selected' : '' }}>Dryer Vent/Duct Cleaning</option>
                                        <option value="chimney-sweep" {{ old('subject') === 'chimney-sweep' ? 'selected' : '' }}>Chimney Sweep</option>
                                        <option value="other" {{ old('subject') === 'other' ? 'selected' : '' }}>Other</option>
                                    </select>

                                    @if ($errors->has('subject'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('subject') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-form-control">
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone (required)" value="{{ old('phone') }}" required/>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-form-control">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" name="email" class="form-control" placeholder="Email (optional)" value="{{ old('email') }}" />

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-form-control">
                                <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                    <textarea name="message" class="form-control" rows="4" placeholder="Message (required)" required>{{ old('message') }}</textarea>

                                    @if ($errors->has('message'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-form-control">
                                <button type="submit" name="submit" class="btn bg-blue btn-block">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 appointment-right">
                <div class="appointment-right-c">
                    <div class="text-center">
                        <i class="mdi mdi-phone-in-talk-outline"></i>
                        <h5>
                            <a href="tel: +1 (408) 370-8797">
                                +1 (408) 370-8797
                            </a>
                        </h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END CONTACT US -->
