<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLfhARd7\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLfhARd7/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerLfhARd7.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerLfhARd7\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerLfhARd7\App_KernelDevDebugContainer([
    'container.build_hash' => 'LfhARd7',
    'container.build_id' => 'b6b1506a',
    'container.build_time' => 1701905657,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLfhARd7');
