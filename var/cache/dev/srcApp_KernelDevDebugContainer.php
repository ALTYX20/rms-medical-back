<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container3o3vA9A\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container3o3vA9A/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container3o3vA9A.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container3o3vA9A\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \Container3o3vA9A\srcApp_KernelDevDebugContainer([
    'container.build_hash' => '3o3vA9A',
    'container.build_id' => '6d43586e',
    'container.build_time' => 1587862155,
], __DIR__.\DIRECTORY_SEPARATOR.'Container3o3vA9A');
