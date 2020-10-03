<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


<table border="0" bgcolor="#ffffff" cellpadding="15" cellspacing="0" style="border-radius:4px;border:1px solid #e1e1e1;margin-right:5px;margin-left:5px">

 <tbody>
 <tr>
 <td style="padding:0">

<table border="0" width="100%" cellspacing="0" cellpadding="15">
    <tbody>
 <tr>

<td style="padding:15px 25px">
<h2 style="font-family:arial,verdana,sans-serif;margin:0;padding:0;color:#414180;font-weight:bold;font-size:23px">
 Boston Economy Car
 </h2> 
 <span> Booking  Receipt </span> <br>
 <span> Phone: (617)642-3792 </span> <br>
 <span> Email: bostoneconomy@gmail.com </span> <br>
 <span> <a href="#"> {{ config('app.name') }}</a></span>
 
 </td>
</tr> 
    <tr>
        <td style="font-family:arial,verdana,sans-serif;font-size:14px;padding:0 25px;line-height:17px;color:#414140;">
            <p style="font-weight:bold">Dear Driver,</p>
         <p>
            Thank you for using {{ config('app.name') }}. We appreciate your business!
        </p>

         <p> 
        A ridr has booked a trip with you. His name is <span style="font-weight: bold;">{{ $firstName }} {{ $lastName }}.</span> Please contact your rider with this email
        <span style="font-weight: bold;">{{ $email }} or phone {{$phone}} </span>. You must do this before the pick-up time: {{ $date }}, {{ $time }}  
       </p>
       <p>Here is details about the booking. </p>
        </td>
    </tr>

    <tr>
        <td bgcolor="#b7ae95" style="padding:15px 25px">
         <h3 style="font-family:arial,verdana,sans-serif;margin:0;padding:0;color:#414141;background-color:#b7ae95;font-size:20px;font-weight:bold">Booking Detials</h3>
        </td>
    </tr>
    
    <tr>
    <td bgcolor="#f5f2f0" style="font-size:14px;font-family:arial,verdana,sans-serif;color:#414141;padding:20px 25px 15px">
        <div style="float:left;clear:left;font-weight:bold;font-size:14px;width:12em;padding-bottom:10px">Service Type:</div>
        <div style="float:left;font-size:14px;padding:0 0 20px 15px;min-width:35%">
        {{$ServiceType}}
         </div><br>

        <div style="float:left;clear:left;
            font-weight:bold;font-size:14px;width:12em;padding-bottom:10px">
            Pick-Up address:
        </div>
        <div  style="float:left;font-size:14px;padding:0 0 20px 15px;min-width:35%">
        {{$pickUpAddress}}
        </div><br>

        
        <div style="float:left;clear:left;font-weight:bold;font-size:14px;width:12em;padding-bottom:10px">Dropp-off address:</div>
        <div style="float:left;font-size:14px;padding:0 0 20px 15px;min-width:35%">
             {{$dropOffAddress}}
        </div><br>

        <div style="float:left;clear:left;
            font-weight:bold;font-size:14px;width:12em;padding-bottom:10px">
            Flight Info:
        </div>
        <div  style="float:left;font-size:14px;padding:0 0 20px 15px;min-width:35%">
        {{$flightInfo}}
        </div><br>
        
        <div style="float:left;clear:left;font-weight:bold;font-size:14px;width:12em;padding-bottom:10px">Vehicle:</div>
        <div style="float:left;font-size:14px;padding:0 0 20px 15px;min-width:35%">
        {{$car}}
        </div><br>

  <div style="float:left;clear:left;
            font-weight:bold;font-size:14px;width:12em;padding-bottom:10px">
            Date and Time:
    </div>

    <div style="float:left;font-size:14px;padding:0 0 20px 15px;min-width:35%">
            {{$date}}<br>
    <div style="padding-bottom:7px">Time -   {{$time}}<br></div>
    </div><br>

    <div style="float:left;clear:left;
            font-weight:bold;font-size:14px;width:12em;padding-bottom:10px">
            Payment Tyep:
        </div>
        <div  style="float:left;font-size:14px;padding:0 0 20px 15px;min-width:35%">
        {{$amount}}
        </div><br>

    <div style="float:left;clear:left;font-weight:bold;font-size:14px;width:12em;padding-bottom:10px">
            Rider Paid:
    </div>
    <div style="float:left;padding:0 0 20px 15px; min-width:35%;color:#469c23">
        <span style="font-size:19px">{{ $fare }} </span> USD </div><br>
        <div style="clear:both;font-size:1px">&nbsp;</div> 

        <div style="float:left;clear:left;
            font-weight:bold;font-size:14px;width:12em;padding-bottom:10px">
            Rider Message:
        </div>
        <div  style="float:left;font-size:14px;padding:0 0 20px 15px;min-width:35%">
            {{$riderMessage}}
        </div><br>
    </td>
    </tr>
    <tr>
    <td bgcolor="#ffffff" style="border-top:1px solid #cccccc;padding:28px 15px">
<h3 style="font-family:arial,verdana,sans-serif;margin:0;padding:0;font-size:19px;font-weight:normal;color:#469c23;text-align:center">
Thanks again for using {{ config('app.name') }}</h3>
        </td>
    </tr> 
</tbody>
</table>

</td></tr>
</tbody></table>
</body>
</html>