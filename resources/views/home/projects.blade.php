@extends('home.layouts.home')
@section('title')
     پروژه ها
@endsection
@section('script')
@endsection
@section('projects')
    <div class="mx-auto  container">
        <div class="border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-800 dark:border-gray-700 bg-slate-50">
            <div class="dark:bg-gray-800 dark:border-gray-700">
                <div class="my-1 border rounded-lg border-1 ">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden px-4">
                                    <div class="bg-slate-100 dark:bg-gray-800 dark:border-gray-700">
                                        <div id="" class="my-1 border rounded-lg border-1 mb-2 pb-8 ">
                                            
                                            <div class="grid grid-cols-1 gap-4 px-2 dark:text-white">
                                            <div class="relative overflow-x-auto px-12">
                                                 <table class="min-w-full text-left text-sm font-light rounded-sm border border-1 ">
                                                        <thead class="border bg-stone-300 font-medium dark:border-neutral-500 dark:bg-neutral-600 font-titr rounded-tr-lg">
                                                            <tr class="text-center  rounded-lg border-2">
                                                                <th scope="col" class="px-6 py-4" rounded-tl-sm>#</th>
                                                                <th scope="col" class="px-6 py-4 rounded-tl-sm">عنوان پروژه</th>
                                                                <th scope="col" class="px-6 py-4 rounded-tl-sm"> کارفرما </th>
                                                                <th scope="col" class="px-6 py-4 rounded-tl-sm">مشاور  </th>
                                                                <th scope="col" class="px-6 py-4 rounded-tl-sm">محل اجرا  </th>
                                                                <th scope="col" class="px-6 py-4 rounded-tl-sm">(ریال)هزینه اجرا </th>
                                                                <th scope="col" class="px-6 py-4 rounded-tl-sm"> شروع</th>
                                                                <th scope="col" class="px-6 py-4 rounded-tl-sm">پایان </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($projects as $project)
                                                                <tr class=" text-center dark:text-white dark:bg-gray-800 font-titr">
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                            {{ $project->id }}
                                                                    </td> 
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                            {{ $project->project }}
                                                                    </td> 
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                            {{ $project->employer }}
                                                                    </td> 
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                            {{ $project->consultant }}
                                                                    </td> 
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                        
                                                                            {{ $project->location }}
                                                                    </td> 
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                        
                                                                            {{ $project->cost }}
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                            {{ verta( $project->Projectstart)->formatJalaliDate() }}
                                                                            
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                            {{ verta( $project->Projectend)->formatJalaliDate() }}
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
