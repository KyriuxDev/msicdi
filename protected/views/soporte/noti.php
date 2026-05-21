
    <link rel="stylesheet" type="text/css" href="/msicdi/css/Noti/style_light.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="/msicdi/js/Noti/jquery-ui-1.8.14.custom.min.js" type="text/javascript"></script>
    <script src="/msicdi/js/Noti/ttw-notification-menu.min.js" type="text/javascript"></script>
    <script src="/msicdi/js/Noti/demo.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="/msicdi/css/Noti/style.css">
    <link rel="stylesheet" type="text/css" href="/msicdi/css/Noti/uniform.css">
    <script type="text/javascript" src="/msicdi/js/Noti/jquery.tools.js"></script>
    <script type="text/javascript" src="/msicdi/js/Noti/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="/msicdi/js/Noti/main.js"></script>

    <style type="text/css">
        .tooltip {
            width: 250px;
            font-size: 11px;
            font-family: Arial, sans-serif;
            background: #444;
            border: 1px solid #090909;
            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            position: absolute;
            z-index: 1;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            color:#fff;
            padding:12px 24px;
            line-height:18px;
        }

        .tooltip:after {
            content: '';
            position: absolute;
            border-color: transparent  #444 transparent transparent;
            border-style: solid;
            border-width: 10px;
            height: 0;
            width: 0;
            position: absolute;
            left: 0;
            top: 50%;
            margin-top: -10px;
            margin-left: -20px;
        }

        .tooltip:before {
            content: '';
            position: absolute;
            border-color:   transparent #090909 transparent transparent;
            border-style: solid;
            border-width: 10px;
            height: 0;
            width: 0;
            position: absolute;
            left: 0;
            top: 50%;
            margin-top: -10px;
            margin-left: -20px;
        }
        

        .ttw-notification-menu{
                width: 276px;
        }


    </style>


<ul class="ttw-notification-menu">
    <li id="projects" class="notification-menu-item first-item"><a href="#">Projects</a></li>
    <li id="tasks" class="notification-menu-item"><a href="#">Tasks</a></li>
    <li id="messages" class="notification-menu-item"><a href="#" >Messages</a></li>
    <li id="clients" class="notification-menu-item last-item"><a href="index.html#">Clients</a></li>
</ul>

<div id="generate-notifications">
    <div class="TTWForm-container">


         <form action="index.html#" id="notification-form" class="TTWForm" method="post" novalidate="">


              <div id="field3-container" class="field f_100">
                   <label for="category">
                        Category
                   </label>
                   <select name="field3" id="category" >
                        <option id="field3-1" value="projects">
                             Projects
                        </option>
                        <option id="field3-2" value="tasks">
                             Tasks
                        </option>
                        <option id="field3-3" value="other">
                             Other
                        </option>
                   </select>
              </div>


              <div id="field4-container" class="field f_100">
                   <label for="message">
                        Message
                   </label>
                   <textarea rows="2" cols="20" name="field4" id="message" >Sample Notification</textarea>
              </div>

              <div id="use-icon-container" class="field f_100 checkbox-group required">

                   <div class="option clearfix">
                        <input name="field5[]" id="use-icon" value="Option 1" type="checkbox">
                        <span class="option-title">
                             Use Icon (Image)?
                        </span>
                        <br>
                   </div>

              </div>


              <div id="use-icon-url-container" class="field f_100">
                   <label for="use-icon-url">
                        Image Url
                   </label>
                   <input name="fieldd" id="use-icon-url" type="text" value="images/icon.png">
              </div>


              <div id="form-submit" class="field f_100 clearfix submit">
                   <input value="Submit" type="submit">
              </div>
         </form>
    </div>
</div>
