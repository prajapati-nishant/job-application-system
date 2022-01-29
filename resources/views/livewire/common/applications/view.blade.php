<div>
    <h3 class="text-2xl font-semibold text-center">Summary</h3>
    <div class="flex flex-col space-y-2">
        <div class="flex flex-col">
            <p><span class="font-semibold">First Name : </span>{{ $application['first_name'] }}</p>
            <p><span class="font-semibold">Last Name : </span>{{ $application['last_name'] }}</p>
            <p><span class="font-semibold">Email : </span>{{ $application['email'] }}</p>
            <p><span class="font-semibold">Phone : </span>{{ $application['phone'] }}</p>
            <p class="capitalize"><span class="font-semibold">Gender : </span>{{ $application['gender'] }}</p>
            <p>
                <span class="font-semibold">Address : </span><br/>
                <span>{{ $application['address']['line_1'] }},{{ $application['address']['line_2'] }}</span><br/>
                <span>{{ $application['address']['city'] }},{{ $application['address']['state'] }}</span><br/>
                <span>{{ $application['address']['zip'] }}</span><br/>
            </p>
        </div>
        @if(!empty($application['educations']))
            <div class="flex flex-col mt-3">
                <p class="font-semibold">Educations</p>
                <table class="table table-zebra w-full">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">Degree/Certificate</th>
                        <th class="px-4 py-2">University/Board</th>
                        <th class="px-4 py-2">Year</th>
                        <th class="px-4 py-2">Percentage/CGPA</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($application['educations'] as $education)
                        <tr>
                            <td class="border px-4 py-2">{{ $education['degree'] }}</td>
                            <td class="border px-4 py-2">{{ $education['university'] }}</td>
                            <td class="border px-4 py-2">{{ $education['year'] }}</td>
                            <td class="border px-4 py-2">{{ $education['grade'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if(!empty($application['experiences']))
            <div class="flex flex-col mt-3">
                <p class="font-semibold">Work Experience</p>
                <table class="table table-zebra w-full">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">Company</th>
                        <th class="px-4 py-2">Designation</th>
                        <th class="px-4 py-2">From</th>
                        <th class="px-4 py-2">To</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($application['experiences'] as $experience)
                        <tr>
                            <td class="border px-4 py-2">{{ $experience['company'] }}</td>
                            <td class="border px-4 py-2">{{ $experience['designation'] }}</td>
                            <td class="border px-4 py-2">{{ $experience['from'] }}</td>
                            <td class="border px-4 py-2">{{ !empty($experience['to']) ? $experience['to'] : 'Present' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if(!empty($application['languages']))
            <div class="flex flex-col mt-3">
                <p class="font-semibold">Languages Known</p>
                @foreach($application['languages'] as $language)
                    <p class="px-4 py-2">{{ $language['name'] }} : @if($language['read']) read, @endif @if($language['write']) write, @endif @if($language['speak']) speak @endif</p>
                @endforeach
            </div>
        @endif

        @if(!empty($application['technicalExperiences']))
            <div class="flex flex-col mt-3">
                <p class="font-semibold">Technical Experience</p>
                @foreach($application['technicalExperiences'] as $technicalExperience)
                    <p class="px-4 py-2 capitalize">{{ $technicalExperience['name'] }} : {{ $technicalExperience['experience'] }}</p>
                @endforeach
            </div>
        @endif
        <div class="flex flex-col">
            <p class="font-semibold">Preference</p>
            <p><span class="font-semibold">Preferred Location : </span>{{ $application['preferred_location'] }}</p>
            <p><span class="font-semibold">Current CTC : </span>{{ $application['current_ctc'] }}</p>
            <p><span class="font-semibold">Expected CTC : </span>{{ $application['expected_ctc'] }}</p>
            <p><span class="font-semibold">Notice Period : </span>{{ $application['notice_period'] }}</p>
        </div>

    </div>
    @if(!empty($from_form))
        <div class="flex items-center justify-between mt-10">
            <button wire:click="back" class="btn btn-secondary">
                <i class="fas fa-arrow-left fa-fw mr-3"></i>back
            </button>
            <button wire:click="submit" class="btn btn-primary">
                <i class="fas fa-check fa-fw mr-3"></i>Confirm
            </button>
        </div>
    @elseif($is_admin)
        <a  class="btn btn-primary mt-5" href="{{ route('admin.applications.edit',['application'=>$application['id']]) }}">
            <i class="fas fa-pencil-alt fa-fw mr-3"></i>Edit
        </a>
    @endif
</div>
