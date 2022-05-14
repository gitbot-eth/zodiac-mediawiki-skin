<?php
/**
 * BaseTemplate class for Foo Bar skin
 *
 * @ingroup Skins
 */
class ZodiacTemplate extends BaseTemplate
{
	private function getZodiacFooterIcons() {
		$footericons = $this->get( 'footericons' );
		foreach ( $footericons as $footerIconsKey => &$footerIconsBlock ) {
			foreach ( $footerIconsBlock as $footerIconKey => $footerIcon ) {
				if ( !isset( $footerIcon['src'] ) ) {
					unset( $footerIconsBlock[$footerIconKey] );
				}
			}
		}
		return $footericons;
	}

	/**
	 * Outputs the entire contents of the page
	 */
	public function execute()
	{
		$this->html('headelement'); ?>

	<div class="relative w-full px-6 pt-10 mx-auto mb-2">
		<div class="flex flex-col items-center justify-center w-full">
			<h1 class="text-5xl font-thin leading-none tracking-widest uppercase text-brown-200">Zodiac Wiki</h1>
			<div class="flex items-center w-full space-x-6 md:space-x-12">
				<div class="w-full h-2 border-t-2 border-b-2 border-brown-200"></div>
				<img src="/w/skins/Zodiac/assets/images/orb.png" alt="Gnosis Guild orb" class="w-16">
				<div class="w-full h-2 border-t-2 border-b-2 border-brown-200"></div>
			</div>
		</div>
		<div class="absolute top-6 right-6">
			<ul class="flex flex-wrap list-reset max-md:mt-4 personal-tools">
				<?php foreach ($this->getPersonalTools() as $key => $item) {
					echo $this->makeListItem($key, $item);
				} ?>
			</ul>
		</div>
	</div>
	<div class="flex flex-wrap items-center justify-between p-2">
		<div>

			<div class="inline-block ml-4 md:hidden">
				<button id="toggle-navigation" class="link">
					Menu
				</button>

				<a href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href']); ?>">
					Home
				</a>
			</div>
		</div>
	</div>

	<div class="flex flex-col flex-grow">
		<div class="md:flex">
			<div class="flex-none w-full p-6 space-y-4 md:max-w-xs max-md:hidden" id="sidebar">
				<?php foreach ($this->getSidebar() as $boxName => $box) : ?>
					<div 
						class="p-4 border-2 border-double shadow-2xl bg-brown-900 border-brown-500 bg-blur-12"
						id="<?php echo Sanitizer::escapeIdForAttribute($box['id']) ?>" <?php echo Linker::tooltip($box['id']) ?>
					>
						<h5 class="mt-0 font-mono"><?php echo htmlspecialchars($box['header']); ?></h5>
						<div class="w-full h-px mt-2 mb-4 bg-brown-500"></div>
						<?php if (is_array($box['content'])) : ?>
							<ul class="text-xs sidebar-list">
								<?php foreach ($box['content'] as $key => $item) {
									echo $this->makeListItem($key, $item);
								} ?>
							</ul>
						<?php
					else :
						echo $box['content'];
					endif;
					?>
					</div>
				<?php endforeach; ?>
	
			</div>
			<div class="flex-1 p-6">
				<div id="p-cactions">
					<div class="container flex items-center justify-between mx-auto mb-2">
						<ul class="flex flex-wrap items-center list-reset md:space-x-2 content-actions">
							<?php foreach ($this->data['content_actions'] as $key => $tab) {
								echo $this->makeListItem($key, $tab);
							} ?>
						</ul>
						<form action="<?php $this->text('wgScript'); ?>" class="inline-block mb-0 ml-2">
							<input type="hidden" name="title" value="<?php $this->text('searchtitle') ?>" />
							<?php echo $this->makeSearchInput(['id' => 'searchInput']); ?>
						</form>
					</div>
				</div>
				<div class="container p-6 mx-auto border-2 border-double shadow-2xl max-md:px-6 border-brown-500 bg-brown-900 bg-opacity-80 bg-blur-12">
					<?php if ($this->data['newtalk']) : ?>
						<div class="line-usermessage">
							<?php $this->html('newtalk'); ?>
						</div>
					<?php endif; ?>
	
					<div id="sitenotice">
						<?php $this->html('sitenotice'); ?>
					</div>
	
					<div class="page-title">
	
						<?php echo $this->getIndicators(); ?>
						<h1 class="p-0 m-0 text-4xl leading-none text-gray-100"><?php $this->html('title'); ?></h1>
	
						<?php if ($this->data['isarticle']) {
							echo '<div>';
							$this->msg('tagline');
							echo '</div>';
						} ?>
	
						<?php $this->html('subtitle'); ?>
						<?php $this->html('undelete'); ?>
					</div>
	
					<div class="articlebody">
						<?php $this->html('bodytext'); ?>
					</div>
					<?php $this->html('dataAfterContent'); ?>
					<?php $this->html('catlinks'); ?>

				</div>

				<div class="footer">
					<div class="footer-icons">
							<?php foreach ($this->getZodiacFooterIcons() as $blockName => $footerIcons) : ?>
								<div>
									<?php foreach ($footerIcons as $icon) {
										echo $this->getSkin()->makeFooterIcon($icon);
									}  ?>
								</div>
							<?php endforeach; ?>
						</div>

						<?php foreach ($this->getFooterLinks() as $category => $links) : ?>
							<ul class="list-reset">
								<?php foreach ($links as $key) : ?>
									<li><?php $this->html($key) ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endforeach; ?>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php $this->printTrail(); ?>
	</body>

	</html><?php
	}
}
