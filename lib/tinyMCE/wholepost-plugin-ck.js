(function(){tinymce.create("tinymce.plugins.Vital",{init:function(e,t){e.addCommand("wholepost",function(){var t=e.selection.getContent(),n="";n='[whole_post link_show="Show More..." link_hide="Hide Post"]'+t+"[/whole_post]";e.execCommand("mceInsertContent",0,n)});e.addButton("wholepost",{title:"Expandable Post Content",cmd:"wholepost",image:t+"/wholepost.png"})},createControl:function(e,t){return null},getInfo:function(){return{longname:"Whole Post shortcode button for Cadence",author:"Tedworth & Oscar",authorurl:"http://tedworthandoscar.co.uk",version:"0.1"}}});tinymce.PluginManager.add("vital",tinymce.plugins.Vital)})();