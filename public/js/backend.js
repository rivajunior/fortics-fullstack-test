(window.webpackJsonp=window.webpackJsonp||[]).push([[2],{1:function(t,n,e){e("szVC"),e("9EEk"),t.exports=e("hSCs")},"9EEk":function(t,n,e){"use strict";e.r(n);e("rXeI");$(".card-checkbox").on("click",function(t){var n=$(t.currentTarget),e=n.find("input");e[0].checked?(n.removeClass("card-checkbox-checked"),e.attr("checked",!1)):(n.addClass("card-checkbox-checked"),e.attr("checked",!0)),$("#btn-delete-many").attr("disabled",!($(".card-checkbox-checked").length>0))})},"9Wh1":function(t,n,e){"use strict";var a=e("PSD3"),r=e.n(a),o=e("EVdn"),c=e.n(o);e("8L3F"),e("SYky");window.$=window.jQuery=c.a,window.Swal=r.a},cJnw:function(t,n){$(function(){$("[data-method]").append(function(){return!$(this).find("form").length>0?"\n<form action='"+$(this).attr("href")+"' method='POST' name='delete_item' style='display:none'>\n<input type='hidden' name='_method' value='"+$(this).attr("data-method")+"'>\n<input type='hidden' name='_token' value='"+$('meta[name="csrf-token"]').attr("content")+"'>\n</form>\n":""}).attr("href","#").attr("style","cursor:pointer;").attr("onclick",'$(this).find("form").submit();'),$("form").submit(function(){return $(this).find('input[type="submit"]').attr("disabled",!0),$(this).find('button[type="submit"]').attr("disabled",!0),!0}),$("body").on("submit","form[name=delete_item]",function(t){t.preventDefault();var n=this,e=$('a[data-method="delete"]'),a=e.attr("data-trans-button-cancel")?e.attr("data-trans-button-cancel"):"Cancelar",r=e.attr("data-trans-button-confirm")?e.attr("data-trans-button-confirm"):"Sim, excluir",o=e.attr("data-trans-title")?e.attr("data-trans-title"):"Você tem certeza que deseja excluir esse item?";Swal.fire({title:o,showCancelButton:!0,confirmButtonText:r,confirmButtonColor:"#f86c6b",cancelButtonText:a,type:"warning"}).then(function(t){t.value&&n.submit()})}).on("click","a[name=confirm_item]",function(t){t.preventDefault();var n=$(this),e=n.attr("data-trans-title")?n.attr("data-trans-title"):"Tem certeza que quer fazer isso?",a=n.attr("data-trans-button-cancel")?n.attr("data-trans-button-cancel"):"Cancelar",r=n.attr("data-trans-button-confirm")?n.attr("data-trans-button-confirm"):"Continuar";Swal.fire({title:e,showCancelButton:!0,confirmButtonText:r,cancelButtonText:a,type:"info"}).then(function(t){t.value&&location.assign(n.attr("href"))})}),$('[data-toggle="tooltip"]').tooltip()})},hSCs:function(t,n){},szVC:function(t,n,e){"use strict";e.r(n);e("9Wh1"),e("cJnw")}},[[1,0,1]]]);
//# sourceMappingURL=backend.js.map