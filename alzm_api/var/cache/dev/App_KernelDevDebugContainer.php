<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerFOuAsVd\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerFOuAsVd/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerFOuAsVd.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerFOuAsVd\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerFOuAsVd\App_KernelDevDebugContainer([
    'container.build_hash' => 'FOuAsVd',
    'container.build_id' => '869f4690',
    'container.build_time' => 1699441672,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerFOuAsVd');
