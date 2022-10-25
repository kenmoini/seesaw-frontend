<x-app-layout>
  <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
      <h2 class="text-xl">Create a new Thread</h2>
      <hr class="mt-2 mb-3 py-2" />
      <form method="POST" action="{{ route('threads.store') }}">
          @csrf
          <label for="title" class="font-bold">Title</label>
          <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded p-2 mb-4">

          <label for="message" class="font-bold">Message</label>
          <textarea name="message" id="message"
              class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
          >{{ old('message') }}</textarea>

          <hr class="my-4" />

          <label for="visibility" class="font-bold">Visibility</label>
          <select name="visibility" id="visibility" class="w-full border border-gray-300 rounded p-2 mb-4">
              <option value="public">Public</option>
              <option value="private">Private</option>
              <option value="authenticated">Authenticated</option>
          </select>

          <label for="type" class="font-bold">Type</label>
          <select name="type" id="type" class="w-full border border-gray-300 rounded p-2 mb-4">
              <option value="informational">Informational</option>
              <option value="identified">Identified</option>
              <option value="scheduled">Scheduled</option>
              <option value="in-progress">In Progress</option>
              <option value="completed">Completed</option>
              <option value="resolved">Resolved</option>
          </select>


          <div class="flex flex-wrap">
            <div class="flex-1">
              <label for="end_date" class="font-bold">End Date (Optional)</label>
              <input type="date" name="end_date" id="end_date" class="w-full border border-gray-300 rounded p-2 mb-4">
            </div>
            <div class="flex-1">
              <label for="end_time" class="font-bold">End Time (Optional)</label>
              <div class="flex flex-row">
                <div class="basis-1/3">
                  <select name="end_time_hour" id="end_time_hour" class="w-full border border-gray-300 rounded p-2 mb-4">
                    <option value=""></option>
                    <option value="01">1</option>
                    <option value="02">2</option>
                    <option value="03">3</option>
                    <option value="04">4</option>
                    <option value="05">5</option>
                    <option value="06">6</option>
                    <option value="07">7</option>
                    <option value="08">8</option>
                    <option value="09">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select>
                </div>
                <div class="basis-1/3">
                  <select name="end_time_minute" id="end_time_minute" class="w-full border border-gray-300 rounded p-2 mb-4">
                    <option value=""></option>
                    <option value="00">00</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                    <option value="45">45</option>
                    <option value="46">46</option>
                    <option value="47">47</option>
                    <option value="48">48</option>
                    <option value="49">49</option>
                    <option value="50">50</option>
                    <option value="51">51</option>
                    <option value="52">52</option>
                    <option value="53">53</option>
                    <option value="54">54</option>
                    <option value="55">55</option>
                    <option value="56">56</option>
                    <option value="57">57</option>
                    <option value="58">58</option>
                    <option value="59">59</option>
                  </select>
                </div>
                <div class="basis-1/3">
                  <select name="end_time_meridiem" id="end_time_meridiem" class="w-full border border-gray-300 rounded p-2 mb-4">
                    <option value=""></option>
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <x-input-error :messages="$errors->get('message')" class="mt-2" />
          <x-primary-button class="mt-4">{{ __('Create Thread') }}</x-primary-button>
      </form>
  </div>
</x-app-layout>