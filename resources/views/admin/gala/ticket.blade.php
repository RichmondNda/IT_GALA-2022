<html>
    <head>
        <link rel="stylesheet" href="">
        <style>
            main{
                display: flex;
                justify-content: center;
            }

            .ticket{
                width: 100%;
                height: 350px;
                display: inline-block;
                background-color: #000;
                color: #fff;
                border-radius: 15px;
                background-image: url(bg6.webp);
                background-size: cover;
                background-position: center;
                border: 1px solid #000;
                position: relative;
            }

            .border{
                border: solid;
            }
            
            .ticket .ticket-presentation{
                padding: 20px;
                flex-grow: 2;
                flex-direction: column;
                display: flex;
                justify-content: space-between;
            }

            .ticket .ticket-qrcode{
                padding: 10px;
                width: 300px;
                height: 360px;
                display: flex;
                align-items: center;
                justify-content: space-around;
                border-left: 6px dotted #fff;
                flex-direction: column;
                position: relative;
                top:-350px;
                left:450px;
            }

            .ticket .ticket-qrcode .qrcode-container{
                width: 200px;
                height: 200px;
                background-size: cover;
                position: relative;
                left:13px;
                top:20px
            }

            .ticket .ticket-qrcode .c2e{
                position: relative;
                left:65px;
                top: 40px
            }

            .ticket .ticket-presentation .ticket-title{
                display: flex;
            }

            .ticket .ticket-presentation .ticket-title .ticket-date-time{
                display: flex;
                position: relative;
                left: -20px;
            }

            .ticket .ticket-presentation .ticket-title .ticket-date-time .mt{
                position: relative;
                left: 95px;
                top: -100px
            }

            .ticket .ticket-presentation .ticket-title .ticket-date-time .day{
                font-size: 90px;
            }

            .ticket .ticket-presentation .ticket-title .ticket-date-time .month{
                font-weight: bold;
            }

            .ticket .ticket-presentation .ticket-title .ticket-date-time .day .value{
                position: relative;
                top: -18px;
                left: 15px;
            }

            .ticket .ticket-presentation .ticket-title .ticket-header .itgala{
                font-weight: bold;
            }

            .ticket .ticket-presentation .ticket-title .ticket-header{
                margin-left: 40px;
                font-size: 30px;
                position: relative;
                top:-145px;
                left: 100px
            }

            .ticket .ticket-presentation .ticket-owner{
                width: 400px;
                padding: 5px;
                background-color: rgba(0,0,0,0.3);
                border-radius: 10px
            }

            .ticket .ticket-presentation .ticket-owner .owner-name{
                font-weight: bold;
                font-size: 25px;
            }

            .ticket .ticket-presentation .ticket-owner .ticket-num{
                font-size: 25px;
            }

        </style>
    </head>
    <body>
        <main>
            <div class="ticket">
                <div class="ticket-presentation">
                    <div class="ticket-title">
                        <div class="ticket-date-time">
                            <div class="day">
                                <span class="value">11</span>
                            </div>
                            <div class="mt">
                                <div class="month">JUIN</div>
                                <div class="time">18H30</div>
                            </div>
                        </div>
                        <div class="ticket-header">
                            <div class="itgala">IT GALA 2022</div>
                            <div>Prépare-toi !</div>
                        </div>
                    </div>
                    <div class="ticket-owner">
                        <div class="owner-name">
                            {{$nom}}
                            <br>
                            {{$prenom}}
                        </div>
                        <div class="ticket-num">
                            N° {{$identifiant}}
                        </div>
                    </div>
                </div>
                <div class="ticket-qrcode">
                    <div class="qrcode-container" style="padding: 8px; background:#fff">
                        <img src="data:image/png;base64, {!! $qr_code !!}">
                    </div>
                    <div class="c2e">
                        <img src="logo_c2e.jpeg" width="100px">
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>