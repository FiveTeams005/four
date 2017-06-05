$(function () {
    var ary1=new Array();
    var ary2=new Array();
    var ary3=new Array();
    $.ajax({
        type : "post",
        url : MVC("Admin","Report","getUserCount"),
        dataType:'json',
        async : false,
        success : function(data){
            for(var i=0;i<data[0].length;i++){
                ary1.push(data[0][i].id)
            }
            for(var y=0;y<data[1].length;y++){
                ary2.push(data[1][y].id)
            }
            for (var z=0;z<data[2].length;z++){
                ary3.push(data[2][z].money)
            }
        }
    });
    var myChart1 = echarts.init(document.getElementById('main1'));
    var myChart2 = echarts.init(document.getElementById('main2'));
    var option1 = {
        title : {
            text: '用户注册及商品交易数量',
            subtext: ''
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['注册新用户量','商品交易量']
        },
        toolbox: {
            show : true,
            feature : {
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'注册新用户量',
                type:'bar',
                data:ary1,
                markPoint : {
                    data : [
                        {type : 'max', name: '最大值'},
                        {type : 'min', name: '最小值'}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name: '平均值'}
                    ]
                }
            },
            {
                name:'商品交易量',
                type:'bar',
                data:ary2,
                markPoint : {
                    data : [
                        {type : 'max', name: '最大值'},
                        {type : 'min', name: '最小值'}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : '平均值'}
                    ]
                }
            }
        ]
    };
    var option2 = {
        title : {
            text: '各月份成交金额',
            subtext: ''
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['成交总金额']
        },
        toolbox: {
            show : true,
            feature : {
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'成交总金额',
                type:'line',
                data:ary3,
                markPoint : {
                    data : [
                        {type : 'max', name: '最大值'},
                        {type : 'min', name: '最小值'}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name: '平均值'}
                    ]
                }
            },
        ]
    };
    myChart1.setOption(option1);
    myChart2.setOption(option2);
   $("#btn1").on("click",function () {
       $("#main1").show();
       $("#main2").hide();
   })
    $("#btn2").on("click",function () {
        $("#main1").hide();
        $("#main2").show();
    })
})