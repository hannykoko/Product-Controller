<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <title>Form Validation</title>
    </head>
    <body>
        <div class="container">
            <h2>Form Validation</h2>
            <div>
                <!-- @if($errors->any())
                <div style="color:red">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
            </div>

            <div>
            <div class="upper">
                @if(session('message'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{session('message')}}</li>
                        </ul>
                    </div><br/>
                @endif
            </div>
            
            <form method = "POST" action="{{url('save-register')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{request()->input('name',old('name'))}}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>Father Name:</strong>
                            <input type="text" name="fathername" class="form-control" placeholder="Father name" value="{{request()->input('fathername',old('fathername'))}}">
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>NRC:</strong>
                            <input type="text" name="NRC" class="form-control" placeholder="01/AcBbbCcc/N/123456" value="{{request()->input('NRC',old('NRC'))}}">
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>Phone no.:</strong>
                            <input type="text" name="phone" class="form-control" placeholder="09xxxxxxxxx" value="{{request()->input('phone',old('phone'))}}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="text" name="email" class="form-control" placeholder="example@mail.com" value="{{request()->input('email',old('email'))}}">
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>Address:</strong>
                            <textarea class="form-control" style="height:150px" name="address" placeholder="Address" value="{{request()->input('address',old('address'))}}"></textarea>
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>Gender:</strong>
                            <input type="radio" id="male" name="gender" value="1">
                                <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="2">
                                <label for="female">Female</label><br>
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>Birthday:</strong>
                            <input type="text" name="DOB" class="form-control" placeholder="dd/mm/yyyy" value="{{request()->input('DOB',old('DOB'))}}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <label for="img">Select an image:</label>
                                <input type="file" id="img" name="image" value="{{request()->input('image',old('image'))}}"> 
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </body>
</html>