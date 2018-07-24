<style>
.sidebar-logo {
background: #80b3ff url(/admin/theme/cwadmin/uploads/cwlogo.png) no-repeat 15px 19px;
padding: 15px 20px;
display: block;
height: 64px;
}

.gallery-cont .item .head h4 {
margin: 0;
font-size: 17px;
word-wrap: break-word;
}


@media(min-width: 1501px){ 
    .fileinput-new {
        min-width: 240px !important;
        max-width: 240px !important;
        max-height: 100% !important;
        min-height: 220px !important;
    }
}



@media(max-width: 1500px){ 
    .fileinput-new {
        min-width: 175px !important;
        max-width: 175px !important;
        max-height: 100% !important;
        min-height: 150px !important;
    }
    .ImageUrl input {
        resize: horizontal;
        width: 300px !important;
    }
    .col-sm-3 label{
        display: none;
    }
    .TrackName input {
        resize: horizontal;
        width: 120px !important;
    }
    .ImageSrc {
        height: 100px !important;
        width: 100px !important;
        background: url(http://lorempixel.com/200/200/city/2) left top no-repeat;
    }
    .ImageOrder input {
        resize: horizontal;
        width: 30px !important;
    }
    
    .iframe {
        width: 640px;
    }
}

.dropzone-frame {
    width: 640px !important;
}


</style>



<script src="/api/dropzone/dist/dropzone.js"></script>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

</head>