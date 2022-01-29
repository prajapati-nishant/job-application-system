<div class="w-full">
    <div class="card shadow-xl bg-base-100 application-form">
        <div class="card-body">
            @if($step != 8)
                <div class="@if($step!=1) hidden @endif">
                    @livewire('common.applications.basic-info',['basic_info'=>$basic_info])
                </div>
                <div class="@if($step!=2) hidden @endif">
                    @livewire('common.applications.education',['educations'=>$educations])
                </div>
                <div class="@if($step!=3) hidden @endif">
                    @livewire('common.applications.work-experience',['experiences'=>$work_experience])
                </div>
                <div class="@if($step!=4) hidden @endif">
                    @livewire('common.applications.languages',['languages'=>$languages])
                </div>
                <div class="@if($step!=5) hidden @endif">
                    @livewire('common.applications.technical-experience',['experiences'=>$technical_experience])
                </div>
                <div class="@if($step!=6) hidden @endif">
                    @livewire('common.applications.preference',['preference'=>$preference])
                </div>
                @if($step == 7)
                    @livewire('common.applications.view',['application'=>$application])
                @endif
            @else
                <h3 class="text-5xl text-center text-base font-bold text-gray-700 py-56">
                    Thank you for your application.
                </h3>
            @endif
        </div>
    </div>
</div>
