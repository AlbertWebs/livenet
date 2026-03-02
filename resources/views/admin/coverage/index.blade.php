@extends('admin.layouts.app')

@section('title', 'Coverage')
@section('page_title', 'Coverage Map & Areas')

@section('content')
<div class="max-w-3xl mx-auto">
    <form action="{{ route('admin.coverage.update') }}" method="POST" class="space-y-8" id="admin-coverage-form">
        @csrf

        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Coverage map (home page)</h2>
                <p class="text-xs text-gray-500 mt-0.5">Map shown in the “Our Coverage” section on the home page</p>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Use embedded map (optional)</label>
                    <p class="text-xs text-gray-500 mb-2">Paste a Google Maps embed URL to replace the interactive map. Leave blank to keep the interactive coverage zones map.</p>
                    <input type="text" name="coverage_map_embed_url" value="{{ old('coverage_map_embed_url', $settings['coverage_map_embed_url'] ?? '') }}" placeholder="https://www.google.com/maps/embed?pb=..." class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition text-sm">
                </div>
                <div class="pt-3 border-t border-gray-100">
                    <p class="text-xs text-gray-600 font-medium mb-3">If using the interactive map: set center and zoom</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Map center (lat, lng)</label>
                            <input type="text" name="coverage_map_center" value="{{ old('coverage_map_center', $settings['coverage_map_center'] ?? '') }}" placeholder="-1.286389, 36.817223" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Zoom level (1–18)</label>
                            <input type="number" name="coverage_map_zoom" value="{{ old('coverage_map_zoom', $settings['coverage_map_zoom'] ?? '') }}" placeholder="11" min="1" max="18" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition text-sm">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @php
            $zonesFromRequest = old('coverage_map_zones');
            if ($zonesFromRequest !== null && $zonesFromRequest !== '') {
                $dec = json_decode($zonesFromRequest, true);
                $coverageZones = is_array($dec) ? $dec : $coverageZones;
            }
            $kenyaAreasByCounty = $kenyaLocations ?? config('kenya_locations.counties', []);
        @endphp

        <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/80">
                <h2 class="text-sm font-semibold text-gray-900 tracking-wide uppercase">Coverage areas</h2>
                <p class="text-xs text-gray-500 mt-0.5">Areas shown on the home page map. Add by county/area or enter coordinates manually.</p>
            </div>
            <div class="p-6">
                <textarea name="coverage_map_zones" id="coverage_map_zones_input" class="hidden" rows="1" aria-hidden="true">{{ json_encode($coverageZones, JSON_HEX_TAG | JSON_UNESCAPED_SLASHES) }}</textarea>
                <p class="text-xs text-gray-500 mb-2">Click <strong>Edit</strong> to change an area's name or coordinates; click <strong>Delete</strong> to remove it. Then click <strong>Save coverage</strong> below to apply.</p>
                <div id="coverage-zones-list" class="space-y-2 mb-4 max-h-48 overflow-y-auto">
                    @foreach($coverageZones as $idx => $zone)
                    <div class="coverage-zone-row flex items-center justify-between gap-3 py-2 px-3 rounded-lg bg-gray-50 border border-gray-100" data-index="{{ $idx }}" data-name="{{ e($zone['name'] ?? '') }}" data-coords="{{ e(json_encode($zone['coords'] ?? [])) }}">
                        <span class="coverage-zone-name font-medium text-gray-800">{{ $zone['name'] ?? 'Unnamed' }}</span>
                        <span class="text-xs text-gray-500">{{ count($zone['coords'] ?? []) }} points</span>
                        <div class="flex gap-2">
                            <button type="button" class="coverage-zone-edit text-sm text-blue-600 hover:text-blue-700">Edit</button>
                            <button type="button" class="coverage-zone-delete text-sm text-red-600 hover:text-red-700">Delete</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="flex flex-wrap gap-3 mb-4">
                    <button type="button" id="coverage-reset-default" class="text-sm px-3 py-1.5 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">Reset to default areas</button>
                </div>

                <script type="application/json" id="kenya-areas-by-county">{!! json_encode($kenyaAreasByCounty) !!}</script>
                <div id="coverage-add-form" class="p-4 rounded-xl border-2 border-dashed border-gray-200 bg-gray-50/50 space-y-3">
                    <p class="text-sm font-medium text-gray-700">Add new area by location</p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">County</label>
                            <select id="coverage-new-county" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm bg-white">
                                <option value="">Select county</option>
                                @foreach($kenyaAreasByCounty as $countyName => $areas)
                                    <option value="{{ e($countyName) }}">{{ $countyName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Area</label>
                            <select id="coverage-new-area" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm bg-white" disabled>
                                <option value="">Select area</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Location (optional)</label>
                            <input type="text" id="coverage-new-location" placeholder="e.g. estate, landmark, street" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm" aria-describedby="coverage-location-hint" title="Anything residents would recognise — leave blank to use county + area only">
                            <p id="coverage-location-hint" class="mt-1 text-xs text-gray-500">Leave blank to use county + area only.</p>
                        </div>
                    </div>
                    <script>
                    (function(){
                        var dataEl = document.getElementById('kenya-areas-by-county');
                        var countySelect = document.getElementById('coverage-new-county');
                        var areaSelect = document.getElementById('coverage-new-area');
                        var areasByCounty = {};
                        if (dataEl && dataEl.textContent) { try { areasByCounty = JSON.parse(dataEl.textContent); } catch (e) {} }
                        if (countySelect && areaSelect) {
                            countySelect.addEventListener('change', function() {
                                var county = this.value;
                                areaSelect.options.length = 0;
                                areaSelect.appendChild(new Option('Select area', '', true, true));
                                areaSelect.disabled = !county;
                                if (county && areasByCounty[county] && Array.isArray(areasByCounty[county])) {
                                    for (var i = 0; i < areasByCounty[county].length; i++) {
                                        areaSelect.appendChild(new Option(areasByCounty[county][i], areasByCounty[county][i]));
                                    }
                                }
                            });
                        }
                    })();
                    </script>
                    <p class="text-xs text-gray-400">Select county and area. Optionally add a location (e.g. estate or landmark). Coordinates are looked up from a local list first, then OpenStreetMap (Nominatim) if needed.</p>
                    <div id="coverage-add-lookup-status" class="text-sm min-h-[1.25rem] mt-1" role="status" aria-live="polite"></div>
                    <button type="button" id="coverage-add-by-location-btn" class="text-sm px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 inline-flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span class="coverage-btn-text">Add by location</span>
                        <span id="coverage-add-spinner" class="hidden animate-spin">⏳</span>
                    </button>
                    <script>
                    (function(){
                        var btn = document.getElementById('coverage-add-by-location-btn');
                        if (btn) btn.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            if (typeof window.onCoverageAddByLocation === 'function') window.onCoverageAddByLocation();
                        });
                    })();
                    </script>
                    <details class="mt-3 text-sm">
                        <summary class="cursor-pointer text-gray-600 hover:text-gray-800">Or enter coordinates manually</summary>
                        <div class="mt-2 space-y-2">
                            <label class="block text-xs font-medium text-gray-600">Area name</label>
                            <input type="text" id="coverage-new-name" placeholder="e.g. Custom zone" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm">
                            <label class="block text-xs font-medium text-gray-600">One lat,lng per line (at least 3 points)</label>
                            <textarea id="coverage-new-coords" rows="3" placeholder="-1.278, 36.808&#10;-1.278, 36.825&#10;-1.295, 36.825" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm font-mono"></textarea>
                            <button type="button" id="coverage-add-btn" class="text-sm px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">Add from coordinates</button>
                        </div>
                    </details>
                </div>

                <div id="coverage-edit-form" class="hidden mt-4 p-4 rounded-xl border-2 border-blue-200 bg-blue-50/30 space-y-3">
                    <p class="text-sm font-medium text-gray-700">Edit area</p>
                    <p id="coverage-edit-heading" class="text-xs text-blue-700 font-medium" aria-live="polite"></p>
                    <input type="hidden" id="coverage-edit-index" value="">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Area name</label>
                        <input type="text" id="coverage-edit-name" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Update location by place name (optional)</label>
                        <input type="text" id="coverage-edit-location" placeholder="e.g. Kilimani, Nairobi" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm">
                        <button type="button" id="coverage-update-from-location-btn" class="mt-2 text-sm px-3 py-1.5 rounded-lg border border-blue-300 text-blue-700 hover:bg-blue-50">Update from this location</button>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Coordinates (one lat,lng per line)</label>
                        <textarea id="coverage-edit-coords" rows="4" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm font-mono"></textarea>
                    </div>
                    <div class="flex gap-2">
                        <button type="button" id="coverage-save-edit" class="text-sm px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">Save</button>
                        <button type="button" id="coverage-cancel-edit" class="text-sm px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">Cancel</button>
                    </div>
                </div>
            </div>
        </section>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-2">
            <p class="text-sm text-gray-500">Click Save to apply changes to the home page.</p>
            <button type="submit" id="coverage-submit-btn" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-sm hover:shadow transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Save coverage
            </button>
        </div>
    </form>
</div>

{{-- Inline so it runs right after the form; no dependency on @stack order --}}
<script>
(function() {
    var defaultZones = @json(config('coverage.default_zones', []));
    var geocodeUrl = @json(route('admin.coverage.geocode'));
    var POLYGON_HALF_DEG = 0.012;

    function getInputEl() { return document.getElementById('coverage_map_zones_input'); }
    function getListEl() { return document.getElementById('coverage-zones-list'); }

    function polygonFromCenter(lat, lng) {
        var d = POLYGON_HALF_DEG;
        return [[lat + d, lng - d], [lat + d, lng + d], [lat - d, lng + d], [lat - d, lng - d]];
    }

    function polygonFromBbox(bbox) {
        if (!bbox || bbox.length < 4) return null;
        var minLat = parseFloat(bbox[0]), maxLat = parseFloat(bbox[1]), minLon = parseFloat(bbox[2]), maxLon = parseFloat(bbox[3]);
        if (isNaN(minLat) || isNaN(maxLat) || isNaN(minLon) || isNaN(maxLon)) return null;
        return [[minLat, minLon], [minLat, maxLon], [maxLat, maxLon], [maxLat, minLon]];
    }

    function geocodeLocation(query, done) {
        var q = (query || '').trim();
        if (!q) { done('Please select county and area.', null); return; }
        fetch(geocodeUrl + '?q=' + encodeURIComponent(q), { credentials: 'same-origin', headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function(r) {
                if (!r.ok) {
                    return r.json().then(function(j) { throw new Error(j && j.error ? j.error : 'Lookup failed (' + r.status + ')'); }, function() { throw new Error('Server error ' + r.status + '. Try again or add the area using coordinates below.'); });
                }
                return r.json();
            })
            .then(function(data) {
                if (data && typeof data.lat === 'number' && typeof data.lng === 'number') {
                    var result = { lat: data.lat, lng: data.lng, display: data.display_name || '' };
                    if (data.bbox && Array.isArray(data.bbox)) result.bbox = data.bbox;
                    done(null, result);
                } else { done('Location not found.', null); }
            })
            .catch(function(err) { done(err.message || 'Could not look up location. Try again.', null); });
    }

    function showAddStatus(msg, isError) {
        var el = document.getElementById('coverage-add-lookup-status');
        if (!el) return;
        el.textContent = msg || '';
        el.style.display = msg ? 'block' : 'none';
        el.className = 'text-sm min-h-[1.25rem] mt-1 ' + (isError ? 'text-red-600' : 'text-gray-600');
    }

    function parseCoordsText(text) {
        var lines = (text || '').split(/\r?\n/).map(function(s) { return s.trim(); }).filter(Boolean);
        var coords = [];
        for (var i = 0; i < lines.length; i++) {
            var parts = lines[i].split(/[\s,]+/).filter(Boolean);
            if (parts.length >= 2) {
                var lat = parseFloat(parts[0]), lng = parseFloat(parts[1]);
                if (!isNaN(lat) && !isNaN(lng)) coords.push([lat, lng]);
            }
        }
        return coords;
    }
    function coordsToText(coords) {
        return (coords || []).map(function(c) { return c[0] + ', ' + c[1]; }).join('\n');
    }
    function getZones() {
        var inputEl = getInputEl();
        if (!inputEl) return [];
        try { var z = JSON.parse(inputEl.value); return Array.isArray(z) ? z : []; } catch (e) { return []; }
    }
    function setZones(zones) {
        var inputEl = getInputEl(), listEl = getListEl();
        if (inputEl) inputEl.value = JSON.stringify(zones);
        if (listEl) renderList(zones);
    }
    function renderList(zones) {
        var listEl = getListEl();
        if (!listEl) return;
        var html = '';
        zones.forEach(function(zone, idx) {
            var name = (zone.name || 'Unnamed').replace(/"/g, '&quot;');
            var coordsStr = (JSON.stringify(zone.coords || [])).replace(/"/g, '&quot;');
            html += '<div class="coverage-zone-row flex items-center justify-between gap-3 py-2 px-3 rounded-lg bg-gray-50 border border-gray-100" data-index="' + idx + '" data-name="' + name + '" data-coords="' + coordsStr + '"><span class="coverage-zone-name font-medium text-gray-800">' + (zone.name || 'Unnamed') + '</span><span class="text-xs text-gray-500">' + (zone.coords ? zone.coords.length : 0) + ' points</span><div class="flex gap-2"><button type="button" class="coverage-zone-edit text-sm text-blue-600 hover:text-blue-700">Edit</button><button type="button" class="coverage-zone-delete text-sm text-red-600 hover:text-red-700">Delete</button></div></div>';
        });
        listEl.innerHTML = html || '<p class="text-sm text-gray-500 py-2">No areas yet. Add one below.</p>';
        listEl.querySelectorAll('.coverage-zone-edit').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var row = btn.closest('.coverage-zone-row');
                if (!row) return;
                var name = row.getAttribute('data-name') || 'Unnamed';
                var coordsRaw = row.getAttribute('data-coords') || '[]';
                document.getElementById('coverage-edit-index').value = row.getAttribute('data-index');
                document.getElementById('coverage-edit-name').value = name;
                var headingEl = document.getElementById('coverage-edit-heading');
                if (headingEl) headingEl.textContent = 'Editing: ' + name;
                try { document.getElementById('coverage-edit-coords').value = coordsToText(JSON.parse(coordsRaw)); } catch(e) { document.getElementById('coverage-edit-coords').value = coordsRaw; }
                document.getElementById('coverage-edit-location').value = '';
                document.getElementById('coverage-edit-form').classList.remove('hidden');
            });
        });
        listEl.querySelectorAll('.coverage-zone-delete').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var row = btn.closest('.coverage-zone-row');
                if (!row) return;
                var zones = getZones();
                zones.splice(parseInt(row.getAttribute('data-index'), 10), 1);
                setZones(zones);
            });
        });
    }

    function onAddByLocationClick() {
        var btn = document.getElementById('coverage-add-by-location-btn');
        if (btn && btn.disabled) return;
        try {
            var countyEl = document.getElementById('coverage-new-county');
            var areaEl = document.getElementById('coverage-new-area');
            var county = (countyEl && countyEl.value) || '';
            var area = (areaEl && areaEl.value) || '';
            var locationOpt = (document.getElementById('coverage-new-location') && document.getElementById('coverage-new-location').value || '').trim();
            var name = area || county || 'Coverage area';
            if (locationOpt) name = name + ' - ' + locationOpt;
            var queryParts = [];
            if (locationOpt) queryParts.push(locationOpt);
            if (area) queryParts.push(area);
            if (county) queryParts.push(county);
            queryParts.push('Kenya');
            if (!county || !area) {
                showAddStatus('Please select both County and Area first.', true);
                return;
            }
            var btnText = btn && btn.querySelector('.coverage-btn-text');
            var spinner = document.getElementById('coverage-add-spinner');
            if (btn) btn.disabled = true;
            if (btnText) btnText.classList.add('hidden');
            if (spinner) spinner.classList.remove('hidden');
            showAddStatus('Looking up location…', false);
            geocodeLocation(queryParts.join(', '), function(err, result) {
                if (btn) btn.disabled = false;
                if (btnText) btnText.classList.remove('hidden');
                if (spinner) spinner.classList.add('hidden');
                if (err) { showAddStatus(err, true); return; }
                var coords = (result.bbox && polygonFromBbox(result.bbox)) || polygonFromCenter(result.lat, result.lng);
                var zones = getZones();
                zones.push({ name: name, coords: coords });
                setZones(zones);
                if (areaEl) areaEl.selectedIndex = 0;
                var locEl = document.getElementById('coverage-new-location');
                if (locEl) locEl.value = '';
                showAddStatus("Added \"" + (name || "").replace(/"/g, '\\"') + "\".", false);
                setTimeout(function() { showAddStatus(''); }, 3000);
            });
        } catch (err) {
            showAddStatus(err.message || 'Something went wrong.', true);
            var btn = document.getElementById('coverage-add-by-location-btn');
            var btnText = btn && btn.querySelector('.coverage-btn-text');
            var spinner = document.getElementById('coverage-add-spinner');
            if (btn) btn.disabled = false;
            if (btnText) btnText.classList.remove('hidden');
            if (spinner) spinner.classList.add('hidden');
        }
    }

    function run() {
        window.onCoverageAddByLocation = onAddByLocationClick;

        var form = document.getElementById('admin-coverage-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var formEl = e.target;
                var formData = new FormData(formEl);
                formData.set('coverage_map_zones', JSON.stringify(getZones()));
                var submitBtn = document.getElementById('coverage-submit-btn') || formEl.querySelector('button[type="submit"]');
                var submitBtnOriginal = submitBtn ? submitBtn.innerHTML : null;
                if (submitBtn) { submitBtn.disabled = true; submitBtn.innerHTML = 'Saving…'; }
                fetch(formEl.action, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'text/html' }
                }).then(function(res) {
                    if (res.redirected) { window.location.href = res.url; return; }
                    if (submitBtn && submitBtnOriginal) { submitBtn.disabled = false; submitBtn.innerHTML = submitBtnOriginal; }
                    alert('Save failed. Please try again.');
                }).catch(function() {
                    if (submitBtn && submitBtnOriginal) { submitBtn.disabled = false; submitBtn.innerHTML = submitBtnOriginal; }
                    alert('Network error. Please try again.');
                });
            });
        }

        var resetBtn = document.getElementById('coverage-reset-default');
        if (resetBtn) resetBtn.addEventListener('click', function() { setZones(defaultZones); });

        var addBtn = document.getElementById('coverage-add-btn');
        if (addBtn) addBtn.addEventListener('click', function() {
            var nameEl = document.getElementById('coverage-new-name');
            var name = (nameEl && nameEl.value || '').trim() || 'Coverage area';
            var coords = parseCoordsText((document.getElementById('coverage-new-coords') || {}).value);
            if (coords.length < 3) { alert('Please enter at least 3 points (one lat,lng per line).'); return; }
            var zones = getZones();
            zones.push({ name: name, coords: coords });
            setZones(zones);
            if (nameEl) nameEl.value = '';
            var coordsEl = document.getElementById('coverage-new-coords');
            if (coordsEl) coordsEl.value = '';
        });

        var updateLocBtn = document.getElementById('coverage-update-from-location-btn');
        if (updateLocBtn) updateLocBtn.addEventListener('click', function() {
            var locationQuery = (document.getElementById('coverage-edit-location').value || '').trim();
            if (!locationQuery) { alert('Please enter a location.'); return; }
            var idx = parseInt(document.getElementById('coverage-edit-index').value, 10);
            var zones = getZones();
            if (idx < 0 || idx >= zones.length) return;
            var self = this;
            self.disabled = true;
            self.textContent = 'Looking up…';
            geocodeLocation(locationQuery, function(err, result) {
                self.disabled = false;
                self.textContent = 'Update from this location';
                if (err) { alert(err); return; }
                zones[idx].coords = (result.bbox && polygonFromBbox(result.bbox)) || polygonFromCenter(result.lat, result.lng);
                setZones(zones);
                document.getElementById('coverage-edit-coords').value = coordsToText(zones[idx].coords);
                document.getElementById('coverage-edit-location').value = '';
            });
        });

        var saveEditBtn = document.getElementById('coverage-save-edit');
        if (saveEditBtn) saveEditBtn.addEventListener('click', function() {
            var idx = parseInt(document.getElementById('coverage-edit-index').value, 10);
            var name = (document.getElementById('coverage-edit-name').value || '').trim();
            var coords = parseCoordsText(document.getElementById('coverage-edit-coords').value);
            if (!name) { alert('Please enter an area name.'); return; }
            if (coords.length < 3) { alert('Please enter at least 3 points.'); return; }
            var zones = getZones();
            if (idx >= 0 && idx < zones.length) { zones[idx] = { name: name, coords: coords }; setZones(zones); }
            document.getElementById('coverage-edit-form').classList.add('hidden');
            var h = document.getElementById('coverage-edit-heading'); if (h) h.textContent = '';
        });

        var cancelEditBtn = document.getElementById('coverage-cancel-edit');
        if (cancelEditBtn) cancelEditBtn.addEventListener('click', function() {
            document.getElementById('coverage-edit-form').classList.add('hidden');
            var h = document.getElementById('coverage-edit-heading'); if (h) h.textContent = '';
        });

        renderList(getZones());
    }

    run();
})();
</script>
@endsection
