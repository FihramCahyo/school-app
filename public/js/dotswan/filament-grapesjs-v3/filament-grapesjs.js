document.addEventListener("alpine:init",()=>{Alpine.data("grapesjs",({state:t,statePath:l,readOnly:r,tools:s,minHeight:n,container:e})=>({instance:null,state:t,tools:s,init(){let o={};this.instance=grapesjs.init({height:n+"px",container:e||".filament-grapesjs .grapesjs-wrapper",showOffsets:!0,fromElement:!0,noticeOnUnload:!1,storageManager:!1,loadHtml:t,plugins:["grapesjs-tailwind"]}),this.instance.on("update",d=>{var i=this.instance.getHtml({cleanId:!0}),a=i.match(/<body\b[^>]*>([\s\S]*?)<\/body>/);a?this.state=a[1]:this.state=this.instance.getHtml()})}}))});