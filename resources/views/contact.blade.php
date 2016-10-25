@extends('layouts.app')

@section('header')
    <link rel="stylesheet" href="{{ URL::asset('css/contact.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-6">
                    <h4>
                        <b>Contact</b>
                    </h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Voluptatum recusandae nostrum unde fugiat officia accusamus sequi. 
                        Voluptatem iure eius recusandae saepe vitae dolores ea, perferendis voluptas, 
                        similique aliquam velit ipsam.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Voluptatum recusandae nostrum unde fugiat officia accusamus sequi. 
                        Voluptatem iure eius recusandae saepe vitae dolores ea, perferendis voluptas, 
                        similique aliquam velit ipsam.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-info contact-info">
                        <p>
                            <strong>Project cars</strong><br>
                            Sportweg 8<br>
                            4308 AE Sirjansland<br>
                            The Netherlands<br><br>
                            <strong>E-mail</strong> : <a href="mailto:k.karaivanof@gmail.com">k.karaivanof@gmail.com</a><br>
                            <strong>Phone</strong> : +31 0654325164
                        </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>

            {{ Form:: open(array('action' => 'ContactController@getContactForm')) }} 

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group col-md-12">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                </div>
                <div class="form-group col-md-12">
                    <label for="message">Question/Comment</label>
                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Question/Comment"></textarea>
                </div>
                 <div class="form-group col-md-12">
                    {!! Recaptcha::render() !!}
                </div>
                <div class="form-group col-md-12">
                    {{ Form::submit('Contact us', array('class' => 'btn btn-primary')) }}
                </div>
            </div>

            {{ Form:: close() }}
        </div>
        <div class="col-md-10 col-md-offset-1">
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
