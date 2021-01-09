@extends('layouts.master')


@section('content')<style type="text/css">
      <style>
      .ms-parent{
        width: 100%;
      }    
      #editor {
    max-height: 180px;
    height: 180px;
    background-color: white;
    border-collapse: separate; 
    border: 1px solid rgb(204, 204, 204); 
    padding: 4px; 
    box-sizing: content-box; 
    -webkit-box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset; 
    box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset;
    border-top-right-radius: 3px; border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px; border-top-left-radius: 3px;
    overflow: scroll;
    outline: none;
}
#voiceBtn {
  width: 20px;
  color: transparent;
  background-color: transparent;
  transform: scale(2.0, 2.0);
  -webkit-transform: scale(2.0, 2.0);
  -moz-transform: scale(2.0, 2.0);
  border: transparent;
  cursor: pointer;
  box-shadow: none;
  -webkit-box-shadow: none;
}

div[data-role="editor-toolbar"] {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.dropdown-menu a {
  cursor: pointer;
}
</style>
<link rel="stylesheet" type="text/css" href="{{asset('public/multiple-select-develop/dist/multiple-select.css')}}">
<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="https://mindmup.github.io/bootstrap-wysiwyg/external/google-code-prettify/prettify.css">

 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  
                  <div class="x_content">


                          
          @if (\Session::has('success'))
          <div class="alert alert-success" >
          {!! \Session::get('success') !!}
          </div>
          @endif
                  <form action="{{URL('/send_mail')}}" method="Post" id="send_mail">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mail</div>
                <div class="card-body">
                    @csrf
                            <div class="row form-group">
                     <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-8">
                                     <select id='test' multiple="multiple"   required name='email[]' style="width: 100%">
                                       
                                <optgroup label="Missing profile directors">
                                    @foreach($partial_director_email as $user)
                                     <option {{$user->email == $email ? 'selected' : ''}} value="{{$user->email}}">{{$user->email}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Profile directors">
                                    @foreach($complete_director_email as $user)
                                     <option {{$user->email == $email ? 'selected' : ''}} value="{{$user->email}}">{{$user->email}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Missing profile company">
                                    @foreach($partial_company_email as $user)
                                     <option {{$user->email == $email ? 'selected' : ''}} value="{{$user->email}}">{{$user->email}}</option>
                                    @endforeach
                                </optgroup>
                                   <optgroup label="Profile company">
                                    @foreach($complete_company_email as $user)
                                     <option {{$user->email == $email ? 'selected' : ''}} value="{{$user->email}}">{{$user->email}}</option>
                                    @endforeach
                                </optgroup>
                                </select>
                                </div>
                            </div>
                             <div class="row form-group">
                     <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Subject</label>
                                </div>
                                <div class="col-12 col-md-8">
                                     <input type="text" name="subject" id="subject" class="form-control"> 
                                </div>
                            </div>
                            <div>
                                 <div class="row form-group">
                     <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Mail</label>
                                </div>
                                <div class="col-12 col-md-8">
                                     <div>
      <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
          </ul>
        </div>
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
          <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
          <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
          </ul>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
        <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
      </div>
      <div class="btn-group">
          <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
            <div class="dropdown-menu input-append">
                <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                <button class="btn" type="button">Add</button>
        </div>
        <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>

      </div>
      
      <div class="btn-group">
        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
      </div>
      <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
    </div>

    <div id="editor" style="width: 100%;">
    </div>
    <textarea id="message" name='message' style="display: none"></textarea>
  </div>
 
                                     
  
                                </div>
                            </div>
                            <div class="row form-group">
                     <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <button type='submit' class="btn btn-info">Email</button>
                                </div>
                            </div>
                            <div>
                                
                            </div>
                           
                </div>
            </div>
        </div>
    </div>
</div>                
                            </form>
        
       </div>
            </div>
        </div>
    </div>
</div>                
        
   </div>


@endsection
@section('footer')
  <script src="{{asset('public/multiple-select-develop/dist/multiple-select.js')}}"></script>
  <script src="https://mindmup.github.io/bootstrap-wysiwyg/bootstrap-wysiwyg.js"></script>
  <script src="https://mindmup.github.io/bootstrap-wysiwyg/external/jquery.hotkeys.js"></script>

  <script src="https://mindmup.github.io/bootstrap-wysiwyg/external/google-code-prettify/prettify.js"></script>
  
<script type="text/javascript">
    $(document).ready(function () {
$("select").multipleSelect({
            filter: true,
            multiple: false
        });
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      $('a[title]').tooltip({container:'body'});
        $('.dropdown-menu input').click(function() {return false;})
            .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if ("onwebkitspeechchange"  in document.createElement("input")) {
        var editorOffset = $('#editor').offset();
        $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      } else {
        $('#voiceBtn').hide();
      }
    };
    function showErrorAlert (reason, detail) {
        var msg='';
        if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
        else {
            console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
         '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
    };
    initToolbarBootstrapBindings();  
    $('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
    window.prettyPrint && prettyPrint();

 });
    $( "#send_mail" ).on('submit',function( event ) {
  $('#message').val($('#editor').html());

});   
</script>

@endsection