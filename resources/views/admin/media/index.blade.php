<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Media') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
                       style="margin-bottom: 20px"
                       href="{{route('get.createMedia')}}">
                        add new media
                    </a>

                    <div class="row">
                        <table class="table table-bordered" style="width: 100%">
                            <thead>
                            <tr>
                                <th style="width: 10%">*</th>
                                <th style="width: 30%">Media Title</th>
                                <th style="width: 40%">Media</th>
                                <th style="width: 40%">Media Type</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $row)
                                <tr>
                                    <td> **</td>
                                    <td style="text-align: center">{{$row->title}}</td>
                                    <td>
                                        @if($row->type == \App\Http\Enums\S3Enums::IMAGE)
                                            {!! viewImage($row->path , 'large') !!}
                                        @elseif($row->type == \App\Http\Enums\S3Enums::VIDEO)
                                            {!! viewVideo($row->path,null) !!}
                                        @endif
                                    </td>
                                    <td style="text-align: center">{{$row->type}}</td>
                                    <td>
                                        <a class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
                                           style="margin-bottom: 20px"
                                           href="{{route('delete',$row->id)}}">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
