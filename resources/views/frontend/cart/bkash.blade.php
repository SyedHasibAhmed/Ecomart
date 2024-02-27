<!DOCTYPE html>
<html>
    <head>
        <title>BKash Payment</title>

        <style>
        #container-bg {
            width: 100%;
            height: 100%;
            background-color: #000000;
            opacity: 0.60;
            filter: alpha(opacity=60);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
        }

        .form-signin {
            width: 410px;
            padding: 5px 0px;
            margin: 0 auto;
            background-color: #FFFFFF;
            z-index: 10000;
            position: relative;
            text-align: center;
            color: #fff;
            font-family: 'Roboto', sans-serif;
            margin-top: 150px;
        }
        #logoHolder {
            display: flex;
            justify-content: center;
            height: 100px;
            background-color: #fff;
            width: 100%;
            padding: 0;
        }
        #logo {
            min-width: 300px;
            margin-top: 12px;
            max-height: 80px;
            background-image: url(https://scripts.sandbox.bka.sh/resources/img/bkash_payment.png);
            background-size: contain;
            background-repeat: no-repeat;
        }

        hr.itemDivider {
            border: 3px solid #e44b6f;
            margin-top: 1px;
            margin-bottom: 1px;
        }
        #trxInfo {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            padding-top: 17px;
            padding-left: 5px;
            padding-right: 5px;
            padding-bottom: 17px;
        }
        #merchantLogo {
            width: 32px;
            height: 32px;
            background-size: cover;
            border-radius: 100px;
            margin-top: 2px;
            margin-right: 2px;
            box-shadow: 0px 0px 1px 1px rgba(191, 181, 181, 1);
        }

        div.infoNameInvoice {
            display: flex;
            flex-direction: column;
            padding-left: 1px;
        }
        #merchantName {
            color: #464646;
            font-size: 12px;
            font-family: 'Roboto', sans-serif;
            text-align: left;
        }
        div.infoInvoice {
            display: flex;
            flex-direction: row;
        }

        span.invoiceText {
            font-size: 13px;
            color: #9a9a9a;
            font-family: 'Roboto', sans-serif;
        }
        #merchantInvoice1 {
            color: #9a9a9a;
            font-size: 13px;
            margin-left: 3px;
            width: 50px;
            font-family: 'Roboto', sans-serif;
            white-space: nowrap;
            text-align: start;
        }
        #merchantInvoice2 {
            color: #9a9a9a;
            font-size: 13px;
            overflow: hidden;
            width: 185px;
            margin-left: 45px;
            text-overflow: ellipsis;
            font-family: 'Roboto', sans-serif;
            white-space: nowrap;
            text-align: start;
        }
        div.trxMerchantAmount {
            display: flex;
            flex-direction: row;
            margin-left: 1px;
        }
        span.merchantAmount {
            color: #464646;
            font-family: 'Roboto', sans-serif;
        }
        #merchantAmountVal {
            color: #464646;
            font-family: 'Roboto', sans-serif;
            margin-left: 2px;
        }
        .formBody {
            margin-bottom: 0px;
        }
        #inputHolder {
            display: flex;
            flex-direction: column;
            background-image: url(https://scripts.sandbox.bka.sh/resources/img/input_bg.png);
            width: 100%;
            height: 170px;
            align-items: center;
            justify-content: center;
            background-color: #c94161;
        }
        span.infoText {
            color: #FFFFFF;
            font-size: 11.5px;
            font-family: 'Roboto', sans-serif;
        }
        input{
            padding: 6px 10px;
            background-color: #fff;
            border: 1px solid #D1D1D1;
            box-shadow: none;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            margin-top: 15px;
        }
        .form-signin input{
            font-family: 'fontello', 'Roboto', sans-serif !important;
        }
        .form-signin input{
            margin-bottom: 10px;
            border-radius: 0;
            color: #3c3c3c;
            width: 300px;
        }
        div.buttonAction {
            display: flex;
            flex-direction: row;
        }
        button{
            display: inline-block;
            height: 38px;
            padding: 0 30px;

            text-align: center;

            font-weight: 600;
            line-height: 38px;
            letter-spacing: .1rem;
            text-transform: uppercase;
            text-decoration: none;
            white-space: nowrap;
            border: 1px solid #bbb;
            box-sizing: border-box;
            margin-bottom: 1rem;
        }
        #close_button{
            outline: none;
            width: 50%;
            color: #FFFFFF;
            background-color: #d1d3d4;
            border-right: 1px solid #BCBCBC;
            border-left: 0px solid #000000;
            border-top: 0px solid #000000;
            border-bottom: 0px solid #000000;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            border-radius: 0px;
        }

        #submit_button{
            outline: none;
            width: 50%;
            color: #414042;
            border-right: 1px solid #BCBCBC;
            border-left: 0px solid #000000;
            border-top: 0px solid #000000;
            border-bottom: 0px solid #000000;
            background-color: #d1d3d4;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            border-radius: 0px;
        }

        #footerItem {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-bottom: 5px;
        }
        #credit {
            display: flex;
            flex-direction: row;
            margin-left: 10px;
            margin-right: 10px;
            align-items: center;
        }
        div.dialerItem {
            display: flex;
            width: 23px;
            height: 23px;
            align-items: center;
            justify-content: center;
            background-color: #e2136e;
            border-radius: 50px;
        }
        #dialer {
            background-image: url(https://scripts.sandbox.bka.sh/resources/img/phone.png);
            width: 10px;
            height: 10px;
            background-repeat: no-repeat;
            background-size: contain;
        }
        #dialText {
            color: #c94161;
            margin-left: 10px;
        }

        </style>
</head>
<body>

<span id="container-bg"></span>
<div class="form-signin">
    <span id="header"><div>
    <div id="logoHolder">
        <div id="logo"></div>
    </div>

    <hr id="itemDiv" class="itemDivider">
    <div id="trxInfo">
        <div id="merchantLogo" style="background-image: url(https://s3-ap-southeast-1.amazonaws.com/merchantlogo.sandbox.bka.sh/merchant-default-logo.png);"></div>
        <div class="infoNameInvoice">
            <span id="merchantName">TestCheckoutMerchant2</span>
            <div class="infoInvoice">
                <span class="invoiceText">Invoice:</span>
                <span id="merchantInvoice1">AAM1690291852118797</span>
            </div>
            <span id="merchantInvoice2"></span>

        </div>
        <div class="trxMerchantAmount">
           <b> <span class="merchantAmount">৳ </span><span id="merchantAmountVal">{{ Cart::priceTotal() }}</span></b>
        </div>
    </div>
</div></span>
    <span id="container">
        <form action="{{ route('bkash') }}" method="post">
            @csrf
            <div id="inputHolder">
                <span for="pin" class="infoText">Enter Transection Number (<b id="phone_num">123456</b>)</span>
                <input type="text" font-size="18px" id="transection" name="transection" class="form-control" placeholder="Enter Transection ID" autocomplete="off" minlength="6" maxlength="6" required="">

            </div>
            <div id="button_div" class="buttonAction">
                <button type="button" id="close_button">Close</button>
                <button type="submit" id="submit_button">Confirm</button>

            </div>
        </form>
    </span>
    <span id="footer"><div id="footerItem">
    <div id="credit">
        <div class="dialerItem">
            <div id="dialer"></div>
        </div>

        <b id="dialText">16247</b>
    </div>
</div></span>
</div>
</body>
</html>


