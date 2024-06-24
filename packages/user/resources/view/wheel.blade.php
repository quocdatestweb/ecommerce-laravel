@extends('products::layouts.app')
@section('content')

    <div class="section"  style="background-color: #15161D">
        <!-- container -->
        <div class="container">
            <main>
                <section class="main" style="padding-top: 5%">
                    <span id="spans">
                        <ul id="ul" class="wheelss"></ul>
                    </span>
                    @if( $spins_left == 0 || $name == "")
                
                    @elseif( $spins_left == 0 && $name != "")
                    <a id="spinsLeftDisplay" class=" order-submit toggle-btn" style=" display: inline-block; padding: 12px 30px; background-color: #3673df; border: none; border-radius: 40px; color: #FFF; text-transform: uppercase; font-weight: 700; text-align: center; -webkit-transition: 0.2s all; transition: 0.2s all;">Bạn còn {{ $spins_left }} lượt quay thưởng.</a>
                    @else
                        <button class="btn--wheelss" id="spinButton" style=" display: inline-block; padding: 12px 30px; background-color: #D10024; border: none; border-radius: 40px; color: #FFF; text-transform: uppercase; font-weight: 700; text-align: center; -webkit-transition: 0.2s all; transition: 0.2s all;">Quay ngay </button>
                        <br>
                        <a id="spinsLeftDisplay" class=" order-submit toggle-btn" style=" display: inline-block; padding: 12px 30px; background-color: #3673df; border: none; border-radius: 40px; color: #FFF; text-transform: uppercase; font-weight: 700; text-align: center; -webkit-transition: 0.2s all; transition: 0.2s all;">Bạn còn {{ $spins_left }} lượt quay thưởng.</a>
                    @endif
                </section>
                <h1 class="msg"></h1>
            </main>
        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            function getSpinsLeft() {
                $.ajax({
                    url: '{{ route('user.spins-left') }}',
                    method: 'GET',
                    success: function(response) {
                        // Update spins_left value on the page
                        $('#spinsLeftDisplay').text('Bạn còn ' +response.spins_left+' lượt quay thưởng.');
                        
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching spins_left:', error);
                    }
                });
            }

            $('#spinButton').on('click', function(event) {
                getSpinsLeft();
                event.preventDefault();
                $.ajax({
                    url: '{{ route('user.spin') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Update spins count in UI
                        $('#turnCount').text(response.turn);
                        
                        // Optionally, show a success message
                        // $('.msg').html('<div class="alert alert-success">Spin performed successfully.</div>');
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        // $('.msg').html('<div class="alert alert-danger">Đã xảy ra lỗi: ' + xhr.responseText + '</div>');
                    }
                });

            });
        });
    </script>
    
@endsection
