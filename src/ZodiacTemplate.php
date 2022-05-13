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

	<div class="flex justify-between items-center flex-wrap p-2">
		<div>
			<form action="<?php $this->text('wgScript'); ?>" class="inline-block">
				<input type="hidden" name="title" value="<?php $this->text('searchtitle') ?>" />
				<?php echo $this->makeSearchInput(['id' => 'searchInput']); ?>
			</form>

			<div class="inline-block md:hidden ml-4">
				<button id="toggle-navigation" class="link">
					Menu
				</button>

				<a href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href']); ?>">
					Home
				</a>
			</div>
		</div>

		<ul class="list-reset flex flex-wrap max-md:mt-4 personal-tools">
			<?php foreach ($this->getPersonalTools() as $key => $item) {
				echo $this->makeListItem($key, $item);
			} ?>
		</ul>
	</div>

	<div class="md:flex">
		<div class="flex-none w-full md:max-w-xs p-6 max-md:hidden" id="sidebar">
			<a href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href']); ?>" <?php echo Xml::expandAttributes(Linker::tooltipAndAccesskeyAttribs('p-logo')) ?>>
				<img src="<?php $this->text('logopath'); ?>" alt="<?php $this->text('sitename') ?>">
			</a>
			<?php foreach ($this->getSidebar() as $boxName => $box) : ?>
				<div id="<?php echo Sanitizer::escapeIdForAttribute($box['id']) ?>" <?php echo Linker::tooltip($box['id']) ?>>
					<h5><?php echo htmlspecialchars($box['header']); ?></h5>
					<?php if (is_array($box['content'])) : ?>
						<ul class="sidebar-list">
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
			<div class="container max-md:px-6 mx-auto pt-6">
				<?php if ($this->data['newtalk']) : ?>
					<div class="line-usermessage">
						<?php $this->html('newtalk'); ?>
					</div>
				<?php endif; ?>

				<div id="sitenotice">
					<?php $this->html('sitenotice'); ?>
				</div>

				<div class="page-title">
					<div id="p-cactions">
						<ul class="flex list-reset flex-wrap">
							<?php foreach ($this->data['content_actions'] as $key => $tab) {
								echo $this->makeListItem($key, $tab);
							} ?>
						</ul>
					</div>

					<?php echo $this->getIndicators(); ?>
					<h1 class="text-4xl text-gray-100 leading-none p-0 m-0"><?php $this->html('title'); ?></h1>

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

				<div class="footer">
					<div>
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
