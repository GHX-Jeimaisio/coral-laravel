@extends('layout.default')

@section('title', 'Homepage')
@section('content')
    <div class="nco">
        <img src="{{url('/images/NCO.png')}}" alt="homepage-image">
        <div class="text-wrapper">
            <div class="text-1">Liverpool v Augsburg</div>
            <div class="text-2">Liverpool To Win in 90 Mins<span>8/1</span></div>
            <div class="text-3">£/€ 5 Bet Only | PLUS £/€5 Free Bet should your bet lose</div>
        </div>
        <form id="emailForm">
            <div>
                <input id="email" name="email" type="text" placeholder="Email"/>
                <span id="error-message"></span>
            </div>
            <div>
                <button type="button" id="submit" class="btn-submit">bet now >></button>
            </div>
        </form>
    </div>
    <div class="instruction">
        <div class="tri-section">
            <div>
                <div class="circle">
                    <img class="rotate" src="{{url('/images/outer-circle.png')}}">
                    <span class="number">1</span>
                </div>
            </div>
            <div>
                <div class="c-text">Register & Deposit £/€5 or More</div>
            </div>
        </div>
        <div class="tri-section">
            <div>
                <div class="circle">
                    <img class="rotate" src="{{url('/images/outer-circle.png')}}">
                    <span class="number">2</span>
                </div>
            </div>
            <div>
                <div class="c-text">Your enhanced odds will display on the homepage</div>
            </div>
        </div>
        <div class="tri-section">
            <div>
                <div class="circle">
                    <img class="rotate" src="{{url('/images/outer-circle.png')}}">
                    <span class="number">3</span>
                </div>
            </div>
            <div>
                <div class="c-text">If your bet wins your winnings will be paid as a £/€40 free bet</div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#submit').attr('disabled', 'disabled');
        $('#email').on('keyup', function() {
            let empty = $('#email').val();
            if (empty) {
                $('#submit').attr('disabled', false);
            } else {
                $('#submit').attr('disabled', 'disabled');
                $('#error-message').html('');
            }

        });
        $('#submit').on('click', function (event){
            event.preventDefault();
            let email = $('#email').val();

            $.ajax({
                url: "/validate-email",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    email:email
                },
                success:function(response){
                    if (response.error) {
                        $('#error-message').removeClass('valid').addClass('invalid')
                    } else {
                        $('#error-message').removeClass('invalid').addClass('valid')

                        var win = window.open('http://www.coral.co.uk/register?email='+email, '_blank');
                        if (win) {
                            //Browser has allowed it to be opened
                            win.focus();
                        } else {
                            //Browser has blocked it
                            alert('Please allow popups for this website');
                        }
                    }
                    $('#error-message').html(response.message);
                    console.log(response);
                },
            });
        });

    </script>
@stop
