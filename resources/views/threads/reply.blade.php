<reply :attributes ="{{ $reply }}" inline-template v-cloak>
    <div id="reply-{{ $reply->id }}" class="card-header mt-4">
                    <div class="level">
                        <h5 class="flex">
                            <a href="{{ route('profile',$reply->owner) }}">
                                {{$reply->owner->name}}
                            </a>


                            <span>said {{$reply->created_at->diffForHumans()}}</span>
                        </h5>
                        <div>
                            <favorite :reply="{{ $reply }}">

                            </favorite>
                        </div>
                    </div>

                <div class="card ">
                    <div class="card-body">
                            <div class="panel-body">
                                <div v-if="editing">
                                    <div class="form-group">
                                        <textarea class ="form-control" v-model="body"></textarea>
                                    </div>

                                    <button class="btn btn-xs btn-primary"
                                             @click="update">
                                             Update
                                     </button>
                                     <button class="btn btn-xs btn-link"
                                             @click="editing = false">
                                             Cancel
                                     </button>
                                </div>

                                <div v-else v-text="body">
                                </div>
                            </div>
                            @can('update',$reply)
                        <div class="card-footer level">
                            <button class="btn btn-xs mr-2" @click="editing = true">Edit</button>
                            <button class="btn btn-danger btn-xs mr-2"
                                    @click="destroy">
                                    Delete
                            </button>

                        </div>
                            @endcan
                    </div>
            </div>
        </div>
</reply>
