<?php
$recipe = $recipe ?? [];
$allRecipes = $allRecipes ?? [];
$timeline = $recipe['timeline'] ?? [];
$batchId = $recipe['batch_id'] ?? 'BATCH-MNG-9842';
$progress = $recipe['progress_percent'] ?? 65;
?>

<div class="min-h-screen bg-black text-white pt-28 pb-20 px-4 sm:px-6 lg:px-8 font-inter">
    <div class="max-w-6xl mx-auto space-y-8">
        
        <!-- Top Breadcrumb & Switcher -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-white/10 pb-6">
            <div>
                <div class="flex items-center gap-2 text-xs text-neutral-400 font-mono uppercase tracking-widest mb-1">
                    <a href="?route=profile" class="hover:text-[var(--gold)] transition">Profile</a>
                    <span>/</span>
                    <a href="?route=craft" class="hover:text-[var(--gold)] transition">Craft Lab</a>
                    <span>/</span>
                    <span class="text-[var(--gold)]">Live Brewing Timeline</span>
                </div>
                <h1 class="text-3xl md:text-5xl font-oswald font-black uppercase tracking-wide text-white flex items-center gap-3">
                    <i data-lucide="flask-conical" class="w-9 h-9 text-teal-400"></i>
                    <?= htmlspecialchars($recipe['name'] ?? "Jeff's Custom Craft Brew") ?>
                </h1>
            </div>

            <!-- Batch Switcher -->
            <?php if (count($allRecipes) > 1): ?>
                <div class="flex items-center gap-2 bg-neutral-900 border border-white/10 p-1.5 rounded-2xl">
                    <span class="text-xs font-bold text-neutral-400 px-3 uppercase tracking-wider">Switch Batch:</span>
                    <select onchange="window.location.href='?route=craft/timeline&id=' + this.value" class="bg-black text-xs font-bold text-[var(--gold)] border border-white/10 rounded-xl px-3 py-2 outline-none cursor-pointer focus:border-[var(--gold)]">
                        <?php foreach ($allRecipes as $rec): ?>
                            <option value="<?= htmlspecialchars($rec['id']) ?>" <?= ($rec['id'] ?? '') === ($recipe['id'] ?? '') ? 'selected' : '' ?>>
                                <?= htmlspecialchars($rec['name']) ?> (<?= htmlspecialchars($rec['batch_id'] ?? 'BATCH') ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>
        </div>

        <!-- Main Banner Card -->
        <div class="relative bg-gradient-to-r from-neutral-900 via-neutral-900/90 to-black border border-white/15 rounded-3xl p-6 md:p-8 overflow-hidden shadow-2xl space-y-6">
            <div class="absolute -right-16 -top-16 w-64 h-64 bg-[var(--gold)]/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="flex flex-col md:flex-row justify-between md:items-center gap-6 border-b border-white/10 pb-6">
                <div class="space-y-2">
                    <div class="flex items-center gap-3">
                        <span class="bg-amber-500/10 border border-amber-500/30 text-amber-300 font-mono text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            ID: <?= htmlspecialchars($batchId) ?>
                        </span>
                        <span class="bg-teal-500/10 border border-teal-500/30 text-teal-300 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                            <?= htmlspecialchars($recipe['status'] ?? 'Primary Fermentation') ?>
                        </span>
                    </div>
                    <p class="text-neutral-300 text-sm max-w-2xl italic">
                        "<?= htmlspecialchars($recipe['notes'] ?? 'Custom craft recipe brewed with local Trinbagonian ingredients.') ?>"
                    </p>
                </div>

                <div class="flex items-center gap-6 bg-black/50 border border-white/10 p-4 rounded-2xl shrink-0">
                    <div>
                        <span class="text-[10px] text-neutral-400 font-semibold uppercase tracking-wider block">Base Style</span>
                        <span class="text-base font-bold text-white font-oswald"><?= htmlspecialchars($recipe['base'] ?? 'Craft Lager') ?></span>
                    </div>
                    <div class="border-l border-white/10 pl-6">
                        <span class="text-[10px] text-neutral-400 font-semibold uppercase tracking-wider block">ABV / IBU</span>
                        <span class="text-base font-bold text-[var(--gold)] font-oswald"><?= htmlspecialchars($recipe['abv'] ?? '6.5%') ?> • <?= htmlspecialchars($recipe['ibu'] ?? '40') ?> IBU</span>
                    </div>
                </div>
            </div>

            <!-- Progress Meter -->
            <div class="space-y-2">
                <div class="flex justify-between items-center text-xs font-bold font-oswald uppercase tracking-wider">
                    <span class="text-white flex items-center gap-2">
                        <i data-lucide="activity" class="w-4 h-4 text-teal-400"></i> Batch Fermentation Progress
                    </span>
                    <span class="text-[var(--gold)] font-mono font-black text-sm"><?= $progress ?>% Complete</span>
                </div>
                <div class="h-3 w-full bg-neutral-800 rounded-full overflow-hidden p-0.5 border border-white/5">
                    <div class="h-full bg-gradient-to-r from-[var(--rust)] via-amber-500 to-[var(--gold)] rounded-full transition-all duration-700 relative" style="width: <?= $progress ?>%">
                        <div class="absolute right-0 top-0 bottom-0 w-3 bg-white/40 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>

            <!-- Telemetry Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 pt-2">
                <div class="bg-black/60 border border-white/10 p-4 rounded-2xl flex items-center gap-3.5">
                    <div class="p-3 bg-red-500/10 text-red-400 border border-red-500/20 rounded-xl shrink-0">
                        <i data-lucide="thermometer" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <span class="text-[10px] text-neutral-400 uppercase font-semibold block">Ferment Temp</span>
                        <span class="text-lg font-bold font-mono text-white"><?= htmlspecialchars($recipe['temp'] ?? '18.5 °C') ?></span>
                    </div>
                </div>

                <div class="bg-black/60 border border-white/10 p-4 rounded-2xl flex items-center gap-3.5">
                    <div class="p-3 bg-teal-500/10 text-teal-400 border border-teal-500/20 rounded-xl shrink-0">
                        <i data-lucide="droplet" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <span class="text-[10px] text-neutral-400 uppercase font-semibold block">Specific Gravity</span>
                        <span class="text-xs font-bold font-mono text-amber-300"><?= htmlspecialchars($recipe['gravity'] ?? '1.014 SG') ?></span>
                    </div>
                </div>

                <div class="bg-black/60 border border-white/10 p-4 rounded-2xl flex items-center gap-3.5">
                    <div class="p-3 bg-amber-500/10 text-amber-400 border border-amber-500/20 rounded-xl shrink-0">
                        <i data-lucide="clock" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <span class="text-[10px] text-neutral-400 uppercase font-semibold block">Est. Ready Date</span>
                        <span class="text-xs font-bold text-white"><?= htmlspecialchars($recipe['est_completion'] ?? 'Aug 3, 2026') ?></span>
                    </div>
                </div>

                <div class="bg-black/60 border border-white/10 p-4 rounded-2xl flex items-center gap-3.5">
                    <div class="p-3 bg-purple-500/10 text-purple-400 border border-purple-500/20 rounded-xl shrink-0">
                        <i data-lucide="sparkles" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <span class="text-[10px] text-neutral-400 uppercase font-semibold block">Infusion</span>
                        <span class="text-xs font-bold text-white truncate block max-w-[150px]"><?= htmlspecialchars($recipe['infusion'] ?? 'Moruga Scorpion') ?></span>
                    </div>
                </div>
            </div>

            <!-- Master Brewer Live Note -->
            <?php if (!empty($recipe['brewer_notes'])): ?>
                <div class="bg-gradient-to-r from-amber-950/40 via-black to-amber-950/40 border border-amber-500/30 p-4 rounded-2xl flex items-start gap-3">
                    <div class="p-2 bg-amber-500/10 text-[var(--gold)] border border-amber-500/20 rounded-lg shrink-0 mt-0.5">
                        <i data-lucide="message-square-quote" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[var(--gold)] block">Master Brewer Marcus Log Update</span>
                        <p class="text-xs text-neutral-200 mt-0.5 font-medium leading-relaxed">
                            <?= htmlspecialchars($recipe['brewer_notes']) ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Live Brewing Step-by-Step Interactive Timeline -->
        <div class="bg-[#111111] border border-white/10 rounded-3xl p-6 md:p-8 space-y-8 shadow-2xl">
            <div class="border-b border-white/10 pb-4 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-oswald font-bold uppercase tracking-wide text-white border-l-4 border-[var(--gold)] pl-3">
                        Brewing & Fermentation Timeline
                    </h2>
                    <p class="text-xs text-neutral-400 mt-1">Track your craft batch stage by stage from mill room to taproom kegging.</p>
                </div>
                <span class="text-xs font-mono text-neutral-400 bg-neutral-900 border border-white/10 px-3 py-1.5 rounded-xl">
                    Live Telemetry Feed
                </span>
            </div>

            <!-- Vertical Timeline Steps -->
            <div class="relative pl-6 md:pl-10 space-y-8 before:absolute before:left-3 md:before:left-5 before:top-3 before:bottom-3 before:w-0.5 before:bg-neutral-800">
                <?php foreach ($timeline as $index => $step): 
                    $isDone = ($step['status'] ?? '') === 'completed';
                    $isInProgress = ($step['status'] ?? '') === 'in_progress';
                ?>
                    <div class="relative flex items-start gap-4 md:gap-6 group">
                        <!-- Icon Circle -->
                        <div class="absolute -left-6 md:-left-10 top-0.5 w-7 h-7 md:w-9 md:h-9 rounded-full border-2 flex items-center justify-center transition-all z-10 
                            <?= $isDone ? 'bg-[var(--gold)] border-[var(--gold)] text-black shadow-lg shadow-[var(--gold)]/20' : ($isInProgress ? 'bg-teal-500 border-teal-400 text-black animate-pulse shadow-lg shadow-teal-500/40' : 'bg-neutral-900 border-neutral-700 text-neutral-500') ?>">
                            <i data-lucide="<?= $isDone ? 'check' : ($isInProgress ? 'loader-2' : 'clock') ?>" class="w-4 h-4 <?= $isInProgress ? 'animate-spin' : '' ?>"></i>
                        </div>

                        <!-- Step Card Content -->
                        <div class="flex-1 bg-black/60 border <?= $isInProgress ? 'border-teal-500/50 bg-teal-950/20' : ($isDone ? 'border-white/10' : 'border-white/5 opacity-60') ?> p-5 rounded-2xl hover:border-white/20 transition space-y-2">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-mono text-[var(--gold)] font-bold">STAGE 0<?= $index + 1 ?></span>
                                    <h3 class="text-lg font-oswald font-bold text-white tracking-wide">
                                        <?= htmlspecialchars($step['stage']) ?>
                                    </h3>
                                </div>
                                <span class="text-[10px] font-mono <?= $isInProgress ? 'text-teal-400 font-bold' : 'text-neutral-400' ?>">
                                    <?= htmlspecialchars($step['date']) ?>
                                </span>
                            </div>
                            <p class="text-xs text-neutral-300 leading-relaxed">
                                <?= htmlspecialchars($step['desc']) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Footer Actions -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 bg-neutral-900 border border-white/10 p-6 rounded-3xl">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-[var(--gold)]/10 text-[var(--gold)] rounded-xl border border-[var(--gold)]/20">
                    <i data-lucide="help-circle" class="w-6 h-6"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white uppercase font-oswald">Questions About Your Batch?</h4>
                    <p class="text-xs text-neutral-400">Ask TriniChat AI about custom yeast strains, fermentation times, or delivery schedules.</p>
                </div>
            </div>
            <div class="flex gap-3 w-full sm:w-auto">
                <button onclick="window.dispatchEvent(new CustomEvent('open-trinichat'))" class="bg-gradient-to-r from-teal-700 to-[var(--gold)] text-white font-bold uppercase text-xs px-5 py-3 rounded-xl hover:shadow-lg transition flex items-center gap-2">
                    <i data-lucide="sparkles" class="w-4 h-4"></i> Ask TriniChat
                </button>
                <a href="?route=profile" class="bg-neutral-800 text-white font-bold uppercase text-xs px-5 py-3 rounded-xl hover:bg-neutral-700 transition flex items-center gap-2 border border-white/10">
                    Back to Profile
                </a>
            </div>
        </div>

    </div>
</div>
