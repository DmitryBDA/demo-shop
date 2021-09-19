<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
  /**
   * Handle the Product "created" event.
   *
   * @param Product $product
   * @return void
   */
  public function created(Product $product)
  {
    //
  }

  /**
   *Выполняется перед созданием модели
   */
  public function creating(Product $product)
  {
    $this->setSlug($product);
  }

  /**
   * Handle the Product "updated" event.
   *
   * @param Product $product
   * @return void
   */
  public function updated(Product $product)
  {
    //
  }

  /**
   * Handle the Product "deleted" event.
   *
   * @param Product $product
   * @return void
   */
  public function deleted(Product $product)
  {
    //
  }

  /**
   * Handle the Product "restored" event.
   *
   * @param Product $product
   * @return void
   */
  public function restored(Product $product)
  {
    //
  }

  /**
   * Handle the Product "force deleted" event.
   *
   * @param Product $product
   * @return void
   */
  public function forceDeleted(Product $product)
  {
    //
  }

  private function setSlug(Product $product)
  {
    if (empty($product->slug)) {
      $product->slug = $product->createSlug($product->name);
    }
  }
}
