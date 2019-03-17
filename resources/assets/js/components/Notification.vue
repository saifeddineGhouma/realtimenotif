<template>
           <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <span class="glyphicon glyphicon-globe"></span> Notification<span class="badge">{{ notifications.length }}</span> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li v-for="notification in notifications">
                                        <a href="#" v-on:click="MarkAsRead(notification)">{{notification.data.post.title}}</a>
                                    </li>
                                    <li v-if="notifications.length==0"> nathink notifie</li>
                                </ul>
                            </li>
                            
</template>

<script>
    export default {
    props: ['notifications'],
        mounted() {
            console.log('Component mounted.')
        },
          methods: {
            MarkAsRead: function(notification) {
                var data = {
                    id: notification.id
                };
                axios.post('/notification/read', data).then(response => {
                    window.location.href = "/post/" + notification.data.post.id;
                });
            }
        }
    }
</script>
