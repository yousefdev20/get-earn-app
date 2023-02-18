"use strict";(self["webpackChunkget_earn_app"]=self["webpackChunkget_earn_app"]||[]).push([[770],{9637:function(t,s,e){e.r(s),e.d(s,{default:function(){return d}});var a=e(3396);const i=(0,a._)("h1",null," Not Found. ",-1),l=[i];function n(t,s,e,i,n,r){return(0,a.wg)(),(0,a.iD)("div",null,l)}var r={name:"NotFound"},o=e(89);const c=(0,o.Z)(r,[["render",n]]);var d=c},8448:function(t,s,e){e.r(s),e.d(s,{default:function(){return N}});var a=e(3396),i=e(7139);const l={class:"content-wrapper"},n={class:"container-fluid"},r={class:"row"},o={class:"col-12 col-lg-12"},c={class:"card"},d=(0,a._)("div",{class:"card-header text-capitalize"}," registered users ",-1),u={class:"table-responsive"},h={class:"table align-items-center table-flush table-borderless"},g=(0,a._)("thead",null,[(0,a._)("tr",null,[(0,a._)("th",null,"Name"),(0,a._)("th",null,"Email"),(0,a._)("th",null,"Registration date"),(0,a._)("th",null,"#Referred users"),(0,a._)("th",null,"Total points earned"),(0,a._)("th",null,"Action")])],-1),p=["onClick"],v=(0,a._)("i",{class:"icon-lock"},null,-1),_=["onClick"],b=(0,a._)("button",{class:"btn btn-light btn-sm bg-info-light2"},[(0,a._)("i",{class:"icon-info"}),(0,a.Uk)(" Info")],-1),f={"aria-label":"Page navigation example",class:"float-right mt-3"},y={class:"pagination"},w=(0,a._)("a",{class:"page-link",href:"#"}," Previous ",-1),x=[w],m=(0,a._)("a",{class:"page-link",href:"#"}," Next ",-1),k=[m],$=(0,a._)("div",{class:"overlay toggle-menu"},null,-1);function D(t,s,e,w,m,D){return(0,a.wg)(),(0,a.iD)("div",l,[(0,a._)("div",n,[(0,a._)("div",r,[(0,a._)("div",o,[(0,a._)("div",c,[d,(0,a._)("div",u,[(0,a._)("table",h,[g,(0,a._)("tbody",null,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(m.users,((t,s)=>((0,a.wg)(),(0,a.iD)("tr",{key:t.id},[(0,a._)("td",null,(0,i.zw)(t.name),1),(0,a._)("td",null,(0,i.zw)(t.email),1),(0,a._)("td",null,(0,i.zw)(t.created_at),1),(0,a._)("td",null,(0,i.zw)(t.referrals_count),1),(0,a._)("td",null,(0,i.zw)(t.total_points_earned),1),(0,a._)("td",null,["active"===t.status?((0,a.wg)(),(0,a.iD)("button",{key:0,class:"btn btn-light btn-sm bg-danger-light2 mx-1",onClick:e=>D.deactivate(t.id,s)},[v,(0,a.Uk)(" Block ")],8,p)):"blocked"===t.status?((0,a.wg)(),(0,a.iD)("button",{key:1,class:"btn btn-light btn-sm bg-success-light2 mx-1",onClick:e=>D.activate(t.id,s)}," Activate ",8,_)):(0,a.kq)("",!0),b])])))),128))])]),(0,a._)("nav",f,[(0,a._)("ul",y,[(0,a._)("li",{class:(0,i.C_)(["page-item",{disable:!m.prev}]),onClick:s[0]||(s[0]=(...t)=>D.getPrev&&D.getPrev(...t))},x,2),(0,a._)("li",{class:(0,i.C_)(["page-item",{disable:!m.next}]),onClick:s[1]||(s[1]=(...t)=>D.getNext&&D.getNext(...t))},k,2)])])])])])]),$])])}var U={name:"AdminDashboard",data(){return{users:[],next:null,prev:null,page:1}},async mounted(){await this.getUsers(`/admin/users?page=${this.page}`)},methods:{async getUsers(t){this.$axios.get(t).then((t=>{this.users=t.data.data.users,this.next=parseInt(t.data.links.next?.toString().split("?page=",2)[1]),this.prev=parseInt(t.data.links.prev?.toString()?.split("?page=",2)[1])}))},async getNext(){await this.getUsers(`/admin/users?page=${this.next}`)},async getPrev(){await this.getUsers(`/admin/users?page=${this.prev}`)},async activate(t,s){this.$axios.put(`/admin/users/${t}`).then((()=>{this.users[s].status="active"}))},async deactivate(t,s){this.$axios.delete(`/admin/users/${t}`).then((()=>{this.users[s].status="blocked"}))}}},z=e(89);const C=(0,z.Z)(U,[["render",D]]);var N=C},4777:function(t,s,e){e.r(s),e.d(s,{default:function(){return y}});var a=e(3396),i=e(7139);const l={class:"content-wrapper"},n={class:"container-fluid"},r={class:"row"},o={class:"col-12 col-lg-12"},c={class:"card"},d=(0,a._)("div",{class:"card-header text-capitalize"}," registered users ",-1),u={class:"table-responsive"},h={class:"table align-items-center table-flush table-borderless"},g=(0,a._)("thead",null,[(0,a._)("tr",null,[(0,a._)("th",null,"Name"),(0,a._)("th",null,"Email"),(0,a._)("th",null,"Phone"),(0,a._)("th",null,"Registration date")])],-1),p=(0,a._)("div",{class:"overlay toggle-menu"},null,-1);function v(t,s,e,v,_,b){return(0,a.wg)(),(0,a.iD)("div",l,[(0,a._)("div",n,[(0,a._)("div",r,[(0,a._)("div",o,[(0,a._)("div",c,[d,(0,a._)("div",u,[(0,a._)("table",h,[g,(0,a._)("tbody",null,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(_.users,(t=>((0,a.wg)(),(0,a.iD)("tr",{key:t.id},[(0,a._)("td",null,(0,i.zw)(t.name),1),(0,a._)("td",null,(0,i.zw)(t.email),1),(0,a._)("td",null,(0,i.zw)(t.phone),1),(0,a._)("td",null,(0,i.zw)(t.created_at),1)])))),128))])])])])])]),p])])}var _={name:"UserDashboard",data(){return{users:[],next:null,prev:null,page:1}},async mounted(){await this.getUsers(`/users?page=${this.page}`)},methods:{async getUsers(t){this.$axios.get(t).then((t=>{this.users=t.data.data.users,this.next=parseInt(t.data.links.next?.toString().split("?page=",2)[1]),this.prev=parseInt(t.data.links.prev?.toString()?.split("?page=",2)[1])}))},async getNext(){await this.getUsers(`/users?page=${this.next}`)},async getPrev(){await this.getUsers(`/users?page=${this.prev}`)},async activate(t,s){this.$axios.put(`/users/${t}`).then((()=>{this.users[s].status="active"}))},async deactivate(t,s){this.$axios.delete(`/users/${t}`).then((()=>{this.users[s].status="blocked"}))}}},b=e(89);const f=(0,b.Z)(_,[["render",v]]);var y=f},1080:function(t,s,e){e.r(s),e.d(s,{default:function(){return Y}});var a=e(3396),i=e(7139);const l={class:"content-wrapper"},n={class:"container-fluid"},r={class:"card mt-3"},o={class:"card-content"},c={class:"row row-group m-0"},d={class:"col-12 col-lg-6 col-xl-3 border-light"},u={class:"card-body"},h={class:"text-white mb-0"},g=(0,a._)("span",{class:"float-right"},[(0,a._)("i",{class:"fa fa-user"})],-1),p=(0,a._)("div",{class:"progress my-3",style:{height:"3px"}},[(0,a._)("div",{class:"progress-bar",style:{width:"55%"}})],-1),v=(0,a._)("p",{class:"mb-0 text-white small-font"},"Unique Visitor",-1),_={class:"col-12 col-lg-6 col-xl-3 border-light"},b={class:"card-body"},f={class:"text-white mb-0"},y=(0,a._)("span",{class:"float-right"},[(0,a._)("i",{class:"fa fa-eye"})],-1),w=(0,a._)("div",{class:"progress my-3",style:{height:"3px"}},[(0,a._)("div",{class:"progress-bar",style:{width:"55%"}})],-1),x=(0,a._)("p",{class:"mb-0 text-white small-font"},"Total Views ",-1),m={class:"col-12 col-lg-6 col-xl-3 border-light"},k={class:"card-body"},$={class:"text-white mb-0"},D=(0,a._)("span",{class:"float-right"},[(0,a._)("i",{class:"fa fa-usd"})],-1),U=(0,a._)("div",{class:"progress my-3",style:{height:"3px"}},[(0,a._)("div",{class:"progress-bar",style:{width:"55%"}})],-1),z=(0,a._)("p",{class:"mb-0 text-white small-font"},"Total Points ",-1),C=(0,a.uE)('<div class="card-body"><h6 class="text-white mb-0">Link<span class="float-right"><i class="fa fa-link"></i></span></h6><div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:55%;"></div></div><p class="mb-0 text-white small-font">Click to Copy Link</p></div>',1),N=[C],R={class:"row"},S={class:"col-12 col-lg-8 col-xl-8"},P={class:"card",style:{"min-height":"460px"}},I=(0,a._)("div",{class:"card-header"},"Daily registration",-1),L={class:"card-body"},W={class:"chart-container-1"},q=(0,a.uE)('<div class="col-12 col-lg-4 col-xl-4"><div class="card" style="min-height:460px;"><div class="card-header">Not yet </div><div class="card-body"></div><div class="table-responsive"></div></div></div>',1),A=(0,a._)("div",{class:"overlay toggle-menu"},null,-1);function Z(t,s,e,C,Z,E){const T=(0,a.up)("DailyRegistrationReport");return(0,a.wg)(),(0,a.iD)("div",l,[(0,a._)("div",n,[(0,a._)("div",r,[(0,a._)("div",o,[(0,a._)("div",c,[(0,a._)("div",d,[(0,a._)("div",u,[(0,a._)("h5",h,[(0,a.Uk)((0,i.zw)(Z.unique_visitors)+" ",1),g]),p,v])]),(0,a._)("div",_,[(0,a._)("div",b,[(0,a._)("h5",f,[(0,a.Uk)((0,i.zw)(Z.total_views)+" ",1),y]),w,x])]),(0,a._)("div",m,[(0,a._)("div",k,[(0,a._)("h5",$,[(0,a.Uk)((0,i.zw)(Z.wallet?.points??0)+" ",1),D]),U,z])]),(0,a._)("div",{class:"col-12 col-lg-6 col-xl-3 border-light",style:{cursor:"pointer"},onClick:s[0]||(s[0]=(...t)=>E.copyLink&&E.copyLink(...t))},N)])])]),(0,a._)("div",R,[(0,a._)("div",S,[(0,a._)("div",P,[I,(0,a._)("div",L,[(0,a._)("div",W,[(0,a.Wm)(T)])])])]),q]),A])])}function E(t,s,e,i,l,n){const r=(0,a.up)("apexchart");return(0,a.wg)(),(0,a.iD)("div",null,[(0,a.Wm)(r,{type:"line",height:"300",options:l.chartOptions,series:l.series},null,8,["options","series"])])}var T={name:"DailyRegistrationReport",data(){return{chartData:null,series:[{name:"Desktops",data:[4,1],labels:{style:{colors:"#ffffff"}}}],dataLabels:{style:{fontSize:"12px",fontWeight:"bold"},background:{enabled:!0,foreColor:"#fff",borderRadius:2,padding:4,opacity:.9,borderWidth:1,borderColor:"#fff"}},chartOptions:{yaxis:{labels:{style:{colors:"#333"}}},tooltip:{theme:"light",style:{fontSize:"14px",fontFamily:"Arial",colors:"#333"}},title:{text:"A daily chart that contains the number of registered users.",align:"left",style:{fontSize:"12px",color:"#ccc"}},subtitle:{text:" (display last 14 days (about 2 weeks))",align:"left",style:{fontSize:"10px",color:"#ccc"}},chart:{height:350,type:"line",zoom:{enabled:!1}},stroke:{curve:"straight"},xaxis:{categories:["2023-02-18","2023-02-17"],labels:{style:{colors:"#ffffff"}}}}}},mounted(){this.init()},methods:{async init(){await this.$axios.get("report").then((t=>{console.log(t),this.series=t.data.data.series,this.chartOptions.xaxis=t.data.data.xaxis}))}}},V=e(89);const F=(0,V.Z)(T,[["render",E]]);var O=F,H={name:"UserDashboard",components:{DailyRegistrationReport:O},data(){return{users:[],next:null,prev:null,total_views:0,unique_visitors:0,page:1,wallet:null}},async mounted(){await this.getUsers(`/users?page=${this.page}`),await this.getWallet(),await this.getViews()},methods:{async getUsers(t){this.$axios.get(t).then((t=>{this.users=t.data.data.users,this.next=parseInt(t.data.links.next?.toString().split("?page=",2)[1]),this.prev=parseInt(t.data.links.prev?.toString()?.split("?page=",2)[1])}))},async getNext(){await this.getUsers(`/users?page=${this.next}`)},async getPrev(){await this.getUsers(`/users?page=${this.prev}`)},async activate(t,s){this.$axios.put(`/users/${t}`).then((()=>{this.users[s].status="active"}))},async deactivate(t,s){this.$axios.delete(`/users/${t}`).then((()=>{this.users[s].status="blocked"}))},copyLink(){navigator.clipboard.writeText(`${window.location.origin}/user/register?refereed_by=${this.$store.state.user.link}`),this.$notify({text:"Link Copied",type:"info"})},async getWallet(){this.$axios.get(`/user_wallet/${this.$store.state.user.id}`).then((t=>{this.wallet=t.data.data}))},async getViews(){this.$axios.get(`/view/${this.$store?.state?.user?.link}`).then((t=>{this.total_views=t.data?.data?.total_views??0,this.unique_visitors=t.data?.data?.unique_visitors??0}))}},watch:{users(){this.getWallet()}}};const K=(0,V.Z)(H,[["render",Z]]);var Y=K}}]);
//# sourceMappingURL=routes.ae10b43c.js.map