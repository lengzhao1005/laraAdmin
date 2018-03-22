@extends('layouts.base')
@section('title','test vue')

@section('nav')
    @parent
    <li>1</li>
    <li>2</li>
    <li>3</li>
    <li>4</li>
    @parent

@endsection

@section('content');
    @verbatim
        <div>123343</div>
        <div class="col-lg-12" id="v1">
            <div v-bind:class="classObject">isactive </div>

            <ul class="list-unstyled col-lg-4">
                <li v-for="(item ,index) in itmes" :key="item.index">
                    {{index}}-{{item.message}}
                </li>

                    <button @click="changeSort">changeSoort(index)</button>
            </ul>
        </div>

        <div id="v2" class="col-lg-12">
            <input placeholder="add new todo" type="text" v-model="newtitle" v-on:keyup.enter="addNewTodo">
            <ul v-if="todos.length">
                <li v-for="(todo,index) in todos">
                    {{todo.title}}
                    <button @click="remove(index)">x</button>
                </li>

            </ul>
            <form action="">
                <button type="submit" v-on:submit.pre v-on:click="warn('Form cannot be submitted yet.', $event)">
                    Submit
                </button>
                <!-- 在“change”时而非“input”时更新 -->
                <input v-model.number="msg" >
                <span>{{msg}}</span>
            </form>

        </div>
    @endverbatim
@endsection

@section('js_test')
    <script type="text/javascript">
        var v1 = new  Vue({
            el:'#v1',
            data:{
                classObject:{'active':true,'error':true},
                itmes:[
                    {message:'1l'},
                    {message:'lz'}
                ],
            },
            methods:{
                changeSort:function () {
                    this.itmes.sort();
                }
            },
        });

        Vue.component('todo-item',{});

        var v2 = new Vue({
            el:'#v2',
            data:{
                todos:[
                    {title:'zb1',id:1},
                    {title:'zb2',id:2},
                    {title:'zb3',id:3},
                    {title:'zb4',id:4},
                    {title:'zb5',id:5}
                ],
                newtitle:'',
                msg:''
            },
            methods:{
                addNewTodo:function(){
                    var length = this.todos.length+1;

                    this.todos.push({
                        title:this.newtitle,
                        id:length++
                    });

                    this.newtitle='';
                },
                remove:function (index) {
                    this.todos.splice(index,1);
                },
                warn: function (message, event) {
                    // 现在我们可以访问原生事件对象
                    if (event) event.preventDefault()
                    alert(message)
                }
            },
        });
    </script>
@endsection