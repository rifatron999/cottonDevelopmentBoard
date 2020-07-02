<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order : {{$employee->id.'_'.$employee->name}}</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
            font-size: 10px;
        }
        .bfont {
            font-size: 15px;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
        img {
            vertical-align: top;
        }
    </style>
</head>
<body>
<h2> <span style="font-weight:bold;">Name</span> : {{ $employee->name }}</h1>
    <h2> <span style="font-weight:bold;">Designation</span> : {{ $employee->designation }}</p>

<table width="100%">
    <tr >
        <td valign="left" >
            <img  src="assets/administration/images/icon/cdblogo.png" width="90" height="50"    > <br>
            <p class="gray" style="font-weight:bold;">Official Information</p>
            <p><span style="font-weight:bold;">Joining Date</span> : {{ $employee->joining_date }}</p>
            <p><span style="font-weight:bold;">Retirement Date</span> : {{ $employee->retirement_date }}
                <b>[ @php
                        use Carbon\Carbon;
                        use Carbon\CarbonInterface;
                        $retire = $employee->retirement_date;
                        $now = Carbon::now();
                        $retire_carbon = Carbon::parse($retire);
                         if($now->diffInDays($retire_carbon) == 0)
                    {
                        echo 'today';
                    }
                    else
                    {
                        echo $retire_carbon->diffForHumans($now, [
                        'syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW,
                        'options' => Carbon::JUST_NOW | Carbon::ONE_DAY_WORDS
                    ]);
                    }
                    @endphp ]
            </p><br>
            <p><span style="font-weight:bold;">Previous Station</span> : {{ $employee->previous_station }}</p>
            <p> <span style="font-weight:bold;">NID Number</span> : {{ $employee->nid_number }}</p>
            <br>
        </td>
        <td align="right">

            <img  src="assets/administration/images/employees/{{ $employee->image }}" width="90" height="50"    >
            <p class="gray" style="font-weight:bold;">Personal Information </p> <br>
            <p> <span style="font-weight:bold;">Current Address</span> : {{ $employee->current_address }}</p>
            <p> <span style="font-weight:bold;">Permanent Address</span> : {{ $employee->permanent_address }}</p>
            <p> <span style="font-weight:bold;">Phone</span> : {{ $employee->phone }}</p>
            <p> <span style="font-weight:bold;">Email</span> : {{ $employee->email }}</p>
            <p> <span style="font-weight:bold;">Date of Birth</span> : {{ $employee->dob }}</p>
            <p> <span style="font-weight:bold;">Education</span> : {{ $employee->education }}</p>
        </td>
    </tr>
</table>
<br/>



</body>
</html>
