<?php $pager->setSurroundCount(2) ?>

<div class="flex items-center justify-center gap-2 mt-8">
    <?php if ($pager->hasPrevious()) : ?>
        <a href="<?= $pager->getFirst() ?>" aria-label="First" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-primary-light hover:text-white transition-colors">
            <span aria-hidden="true">«</span>
        </a>
        <a href="<?= $pager->getPrevious() ?>" aria-label="Previous" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-primary-light hover:text-white transition-colors">
            <span aria-hidden="true">‹</span>
        </a>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
        <a href="<?= $link['uri'] ?>" class="px-4 py-2 rounded-lg border <?= $link['active'] ? 'bg-primary-dark text-white border-primary-dark' : 'bg-white text-gray-700 border-gray-300 hover:bg-primary-light hover:text-white' ?> transition-colors">
            <?= $link['title'] ?>
        </a>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <a href="<?= $pager->getNext() ?>" aria-label="Next" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-primary-light hover:text-white transition-colors">
            <span aria-hidden="true">›</span>
        </a>
        <a href="<?= $pager->getLast() ?>" aria-label="Last" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-primary-light hover:text-white transition-colors">
            <span aria-hidden="true">»</span>
        </a>
    <?php endif ?>
</div>
